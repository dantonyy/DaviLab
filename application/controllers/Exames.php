<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exames extends CI_Controller {
    function __construct() { 
        parent::__construct(); 
        // Load language
        $this->load->helper('language');
        $this->load->helper(array('form', 'url'));

        $this->lang->load(['variaveis_lang','dashboard_lang','errors_html_lang'], 'portuguese');
        // Carrega biblioteca Auth
        $this->load->library('auth');
        // Load models
        $this->load->model('dashboard_model');
        $this->load->model('exames_model');
    } 

// ==========================================================================================================
// ========================================= -- CARREGAR PAGINAS -- =========================================
	public function index(){
        if($this->autenticarUsuario()){
            $access_token = $this->input->post('access_token');
            $id_laboratorio = $this->session->userdata('id_laboratorio');
            $data['exames_lista_json'] = json_decode($this->auth->get_dados_exames_lista($access_token,$id_laboratorio));

			$data['pagina'] = 'exames_lista';
            $this->load->view('includes/html_header',$data);
            $this->load->view('dashboard/exames_lista', $data);
            $this->load->view('includes/html_footer');
		}else{
            redirect('login');
		}
    }

// ================================================================================================
// ========================================= -- SET -- ============================================

    public function setExame() {
        if($this->autenticarUsuario()){
            // Pegar dados do usuário que está fazendo a requisição
            $dados_usuario = $this->dashboard_model->getDadosFuncionario($this->session->userdata('id_usuario_autenticacao'));
            $id_laboratorio_possui_usuario = $dados_usuario->id_laboratorio_possui_usuario;
            $id_paciente = $this->input->post('id_paciente');
            $nome_exame = $this->input->post('nome_exame');
            $profissional = $this->input->post('profissional');

            // Dados do arquivo que está fazendo upload
            $arquivo = explode('.', $_FILES['arquivo_exame']['name']);
            $nome = $arquivo[0];
            $extensao = $arquivo[1];
            $nome_arquivo = $id_paciente . '_' . $nome_exame . '_' . $profissional . '_' . $this->gerarToken();

            $config['upload_path']          =  __DIR__."/../arquivos_upload/arquivos_exames/";
            $config['allowed_types']        = 'pdf';
            $config['file_name']            = $nome_arquivo;
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('arquivo_exame')) {
                $error = array('error' => $this->upload->display_errors());
                $this->output->set_output(json_encode($error));
            } else {
                $api_url = $this->lang->line('endpoint_api_novoExameArquivo');
                $file_path = __DIR__."/../arquivos_upload/arquivos_exames/" . $nome_arquivo . '.' . $extensao;
                $file_data = file_get_contents($file_path);
                
                if (file_exists($file_path)) {
                    $cFile = curl_file_create($file_path, 'application/pdf', $nome_arquivo . '.' .  $extensao);

                    $postData = array(
                        'file' => $cFile
                    );
                    
                    $ch = curl_init();
                    
                    curl_setopt($ch, CURLOPT_URL, $api_url);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
                    
                    $response = curl_exec($ch);
                    
                    if ($response === false) {
                        echo 'Erro ao enviar o arquivo: ' . curl_error($ch);
                    } else {
                        $dados_exame = array (
                            'id_paciente' => $id_paciente,
                            'nome_exame' => $nome_exame,
                            'profissional' => $profissional,
                            'data_realizacao' => $this->input->post('data_exame'),
                            'laudo' => $this->input->post('laudo'),
                            'nome_arquivo' => $nome_arquivo,
                            'extensao' => $extensao,
                            'id_laboratorio_possui_usuario' => $id_laboratorio_possui_usuario,
                            'status_exame' => 1, // 1 - Pendente : Padrão que deve ser alterado a cada interação do paciente com o exame
                            'comentarios_recusa' => ($this->input->post('comentarios_recusa') != '') ? $this->input->post('comentarios_recusa') : ''
                        );

                        $adiciona_exame = $this->exames_model->setPacienteExameArquivo($dados_exame);

                        if ($this->output->set_output($adiciona_exame)) {
                            if ($this->setExameAPI($dados_exame)) {
                                return TRUE;
                            }
                        }
                    }
                    curl_close($ch);
                } else {
                    echo 'O arquivo PDF não foi encontrado.';
                }
            }
		}else{
            redirect('login');
		}
    }

    public function setExameAPI($dados_exame) {
        $url = $this->lang->line('endpoint_api_novo_exame');

        $novo_exame = array (
            "id_usuario_autenticacao" => $dados_exame['id_paciente'],
            "laudo" => $dados_exame['laudo'],
            "nome_exame" => $dados_exame['nome_exame'],
            "nome_arquivo" => $dados_exame['nome_arquivo'],
            "extensao" => $dados_exame['extensao'],
            "profissional" => $dados_exame['profissional'],
            "data_realizacao" => $dados_exame['data_realizacao'],
            "id_laboratorio_possui_usuario" => $dados_exame['id_laboratorio_possui_usuario'],
            "status_exame" => $dados_exame['status_exame'],
            "comentarios_recusa" => ($dados_exame['comentarios_recusa'] != '') ? $dados_exame['comentarios_recusa'] : ""
        );
        
        $options = array(
            'http' => array(
                'method'  => 'POST',
                'header'  => "Content-type: application/json",
                'content' => json_encode($novo_exame)
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {};

        if($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
// ================================================================================================
// ========================================= -- GET -- ============================================

// ================================================================================================
// ========================================= -- UPDATE -- =========================================

// ================================================================================================
// ========================================= -- DELETE -- =========================================

// ================================================================================================
// ========================================= -- OUTRAS -- =========================================
    public function autenticarUsuario(){
        $logado = $this->session->userdata('logado');
        if($logado){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function gerarToken($tamanho = 32) {
        if($this->autenticarUsuario()){
            // $random_string = uniqid();
            $random_number = mt_rand(1000, 9999);
            // return $random_string . '_' . $random_number;
            return $random_number;
        }else{
            redirect('login');
        }
    }

}
