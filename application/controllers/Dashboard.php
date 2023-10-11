<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('language');

        // Load models
        $this->load->model('dashboard_model');
    }

// ==========================================================================================================
// ========================================= -- CARREGAR PAGINAS -- =========================================
    public function index(){
        if($this->autenticarUsuario()){
            // Obtém a data atual e o número da semana
            $data_atual = date('Y-m-d');
            $numero_semana = date('W', strtotime($data_atual));
            $id_usuario_autenticacao = $this->session->userdata('id_usuario_autenticacao');

            $data['quantidade_pacientes'] = $this->dashboard_model->getQuantidadePacientes($this->session->userdata('id_laboratorio'));

            $this->lang->load('variaveis_lang', 'portuguese');

            $this->load->view('includes/html_header');
            $this->load->view('dashboard/davilab_header');
            $this->load->view('dashboard/dashboard', $data);
		}else{
			redirect('login');
		}
    }

    public function configuracoes(){
        if($this->autenticarUsuario()){
            $this->lang->load(['variaveis_lang','dashboard_lang','errors_html_lang'], 'portuguese');


            $this->load->view('includes/html_header');
            $this->load->view('dashboard/davilab_header');
            $this->load->view('dashboard/configuracoes');
		}else{
			redirect('login');
		}
    }

    public function painel_adm(){
        if($this->autenticarUsuario()){
            $this->lang->load(['variaveis_lang','dashboard_lang','errors_html_lang'], 'portuguese');

            $id_laboratorio = $this->session->userdata('id_laboratorio');
            $data['todos_funcionarios'] = $this->dashboard_model->getTodosFuncionarios($id_laboratorio);

            $this->load->view('includes/html_header');
            $this->load->view('dashboard/davilab_header');
            $this->load->view('dashboard/painel_adm',$data);
		}else{
			redirect('login');
		}
    }

    public function novo_funcionario(){
        if($this->autenticarUsuario()){
            $this->lang->load(['variaveis_lang','dashboard_lang','errors_html_lang'], 'portuguese');
            
            $id_laboratorio = $this->session->userdata('id_laboratorio');

            $data['todos_estados'] = $this->dashboard_model->getEstados();

            $this->load->view('includes/html_header');
            $this->load->view('dashboard/davilab_header');
            $this->load->view('dashboard/novo_funcionario',$data);
        }else{
            redirect('login');
        }
    }
    
    public function editar_funcionario($id_usuario_autenticacao){
        if($this->autenticarUsuario()){
            $this->lang->load(['variaveis_lang','dashboard_lang','errors_html_lang'], 'portuguese');
            
            $id_laboratorio = $this->session->userdata('id_laboratorio');

            $data['todos_estados'] = $this->dashboard_model->getEstados();
            $data['dados_usuario'] = $this->dashboard_model->getDadosFuncionario($id_usuario_autenticacao);

            $this->load->view('includes/html_header');
            $this->load->view('dashboard/davilab_header');
            $this->load->view('dashboard/editar_funcionario',$data);
        }else{
            redirect('login');
        }
    }

    public function pacientes_lista(){
        if($this->autenticarUsuario()){
            $this->lang->load(['variaveis_lang','dashboard_lang','errors_html_lang'], 'portuguese');

            $this->load->view('includes/html_header');
            $this->load->view('dashboard/davilab_header');
            $this->load->view('dashboard/pacientes_lista');
        }else{
            redirect('login');
        }
    }

    public function novo_paciente(){
        if($this->autenticarUsuario()){
            $this->lang->load(['variaveis_lang','dashboard_lang','errors_html_lang'], 'portuguese');

            $this->load->view('includes/html_header');
            $this->load->view('dashboard/davilab_header');
            $this->load->view('dashboard/novo_paciente');
        }else{
            redirect('login');
        }
    }

    public function paciente_perfil(){
        if($this->autenticarUsuario()){
            // Carregar dados
            $this->session->set_userdata($this->input->post('dados_paciente'));
            
            // Carregar página
            $this->lang->load(['variaveis_lang','dashboard_lang','errors_html_lang'], 'portuguese');

            $this->load->view('includes/html_header');
            $this->load->view('dashboard/davilab_header');
            $this->load->view('dashboard/paciente_perfil');
        }else{
            redirect('login');
        }
    }

// =============================================================================================
// ========================================= -- SET -- =========================================

    public function set_funcionario(){
        if($this->autenticarUsuario()){
            if ($this->input->post('nova_senha') == $this->input->post('nova_senha_2')) {
                $senha = $this->input->post('nova_senha');
            } else {
                $erro_code = 'DL004';
                return $erro_code;
            };

            $dados_usuario_autenticacao = array (
                'nome' => $this->input->post('nome'),
                'sobrenome' => $this->input->post('sobrenome'),
                'celular' => $this->input->post('celular'),
                'email' => $this->input->post('email'),
                'senha' => $senha
            );

            $dados_usuario_configuracao = array (
                'endereco' => json_encode(array (
                    'city' => $this->input->post('cidade'),
                    'state' => $this->input->post('estado'),
                    'country' => 'Brasil',
                    'postalCode' => $this->input->post('cep'),
                )),
                'nacionalidade' => $this->input->post('nacionalidade'),
                'cpf' => $this->input->post('cpf'),
                'genero' => $this->input->post('sexo')
            );

            $dados_laboratorio_possui_usuario = array (
                'id_laboratorio' => $this->session->userdata('id_laboratorio'),
                'papel' => $this->input->post('papel')==true ? 1 : 2, // 1 = administrador, 2 = atendente
                'status' => $this->input->post('status')==true ? 1 : 0 // 1 = ativo, 0 = inativo
            );

            $set_novo_usuario = $this->dashboard_model->setNovoUsuario($dados_usuario_autenticacao, $dados_usuario_configuracao, $dados_laboratorio_possui_usuario);
            // $this->output->set_output($set_novo_usuario);

            return $set_novo_usuario;
        }else{
            redirect('login');
        }
    }

    public function set_paciente() {
        if($this->autenticarUsuario()){
            
        }else{
            redirect('login');
        }
    }

// =============================================================================================
// ========================================= -- GET -- =========================================

    public function get_todos_funcionarios() {
        if($this->autenticarUsuario()){
            $id_laboratorio = $this->session->userdata('id_laboratorio');
            $todos_funcionarios = $this->dashboard_model->getTodosFuncionarios($id_laboratorio);

            $this->output->set_output(json_encode($todos_funcionarios));
		}else{
			redirect('login');
		}
    }

    public function get_estado() {
        if($this->autenticarUsuario()){
            $todos_estados = $this->dashboard_model->getEstados();

            $this->output->set_output(json_encode($todos_estados));
		}else{
			redirect('login');
		}
    }

    public function get_municipios_from_estado() {
        if($this->autenticarUsuario()){
            $estado = $this->input->post('estado');
            $municipios = $this->dashboard_model->getMunicipios($estado);

            $this->output->set_output(json_encode($municipios));
		}else{
			redirect('login');
		}
    }

    public function verifica_senha() {
        if($this->autenticarUsuario()){
            $id_usuario_autenticacao = $this->session->userdata('id_usuario_autenticacao');
            $senha_atual = $this->input->post('senha_atual');

            $resultado = $this->dashboard_model->verificaSenha($id_usuario_autenticacao, $senha_atual);

            $this->output->set_output($resultado);
        }else{
            redirect('login');
        }
    }

    public function verifica_paciente() {
        $id_laboratorio = $this->session->userdata('id_laboratorio');
        $id_paciente = $this->input->post('id_paciente');

        $resultado = $this->dashboard_model->verificaPaciente($id_laboratorio, $id_paciente);
        $this->output->set_output($resultado);
    }

    public function get_quantidade_pacientes() {
        $id_laboratorio = $this->session->userdata('id_laboratorio');

        $resultado = $this->dashboard_model->getQuantidadePacientes($id_laboratorio);
        $this->output->set_output($resultado);
    }
// ================================================================================================
// ========================================= -- UPDATE -- =========================================

    public function update_funcionario() {
        if($this->autenticarUsuario()){
            $id_usuario_autenticacao = $this->input->post('id_usuario_autenticacao');

            $dados_usuario_autenticacao = array (
                'nome' => $this->input->post('nome'),
                'sobrenome' => $this->input->post('sobrenome'),
                'celular' => $this->input->post('celular'),
                'email' => $this->input->post('email'),
                'senha' => $this->input->post('senha')
            );

            $dados_usuario_configuracao = array (
                'endereco' => json_encode(array (
                    'city' => $this->input->post('cidade'),
                    'state' => $this->input->post('estado'),
                    'country' => 'Brasil',
                    'postalCode' => $this->input->post('cep'),
                )),
                'nacionalidade' => $this->input->post('nacionalidade'),
                'cpf' => $this->input->post('cpf'),
                'genero' => $this->input->post('sexo')
            );

            $dados_laboratorio_possui_usuario = array (
                'papel' => $this->input->post('papel')==true ? 1 : 2, // 1 = administrador, 2 = atendente
                'status' => $this->input->post('status')==true ? 1 : 0 // 1 = ativo, 0 = inativo
            );

            $update_usuario_autenticacao = $this->dashboard_model->updateUsuarioAutenticacao($id_usuario_autenticacao, $dados_usuario_autenticacao);
            if ($update_usuario_autenticacao == true) {
                $update_usuario_configuracao = $this->dashboard_model->updateUsuarioConfiguracao($id_usuario_autenticacao, $dados_usuario_configuracao);
                if ($update_usuario_configuracao == true) {
                    $update_lab_possui_usuario = $this->dashboard_model->updateLabPossuiUsuario($id_usuario_autenticacao, $dados_laboratorio_possui_usuario);
                    if ($update_lab_possui_usuario == true) {
                        redirect('dashboard/painel_adm');
                        return true;
                    } else {
                        $erro_code = 'DL003';
                        return $erro_code;
                    }
                }
                else {
                    $erro_code = 'DL002';
                    return $erro_code;
                }
            } else {
                $erro_code = 'DL001';
                return $erro_code;
            }
        }else{
            redirect('login');
        }
    }

    public function mudar_senha() {
        if($this->autenticarUsuario()){
            $id_usuario_autenticacao = $this->session->userdata('id_usuario_autenticacao');

            $dados = array (
                'senha' => $this->input->post('nova_senha')
            );

            $resultado = $this->dashboard_model->mudarSenha($id_usuario_autenticacao, $dados);

            $this->output->set_output($resultado);
        }else{
            redirect('login');
        }
    }

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

    
}
?>