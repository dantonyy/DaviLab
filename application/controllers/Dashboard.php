<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('language');
    }


    public function index(){
        if($this->autenticarUsuario()){

			// Carrega as frases da semana em português
            $this->lang->load('frases_da_semana', 'portuguese');
            $this->lang->load('configuracoes', 'portuguese');



            // Obtém a data atual e o número da semana
            $data_atual = date('Y-m-d');
            $numero_semana = date('W', strtotime($data_atual));
    
            // Obtém a lista de frases da semana
            $frases = $this->lang->line('frases');
    
            // var_dump($frases);
    
            // Calcula o índice da frase da semana atual
            $indice_frase_atual = ($numero_semana - 1) % count($frases);
    
            // Obtém a frase da semana atual
            $frase_atual = $frases[$indice_frase_atual];
    
            $id_usuario = $this->session->userdata('id_usuario');
            $data['id_usuario'] = $id_usuario;

            $data['usuario_autenticacao'] = $this->usuario_model->getUsuarioAutenticacao($id_usuario);

            $data['usuario_perfil_saude'] = $this->usuario_model->getUsuarioPerfilSaude($id_usuario);
            // $dadosVitais['vitais'] = $this->vitais_model->getUsuarioPossuiVitais($id_usuario);
            // $dadosExames['exames'] = $this->exames_model->getUsuarioExamesArquivo($id_usuario);

            $data['frase_atual'] = $frase_atual;
    
            // Carrega a view e passa os dados da frase da semana
            $this->load->view('includes/html_header');
            $this->load->view('includes/menu', $data);

            $this->load->view('configuracoes/pagina_inicial');

		}else{
			redirect('login');
		}
    }

    public function Inicio(){

        // Carrega as frases da semana em português
        $this->lang->load('frases_da_semana','portuguese');
        $this->lang->load('configuracoes', 'portuguese');

        // Obtém a data atual e o número da semana
        $data_atual = date('Y-m-d');
        $numero_semana = date('W', strtotime($data_atual));

        // Obtém a lista de frases da semana
        $frases = $this->lang->line('frases');

        // var_dump($frases);

        // Calcula o índice da frase da semana atual
        $indice_frase_atual = ($numero_semana - 1) % count($frases);

        // Obtém a frase da semana atual
        $frase_atual = $frases[$indice_frase_atual];

        $data['frase_atual'] = $frase_atual;


        $this->load->view('usuarios/inicio', $data);
        $this->load->view('includes/html_footer');
        // $this->load->view('configuracoes/pagina_inicial');


    }
// SET----------------------------------------------

// GET----------------------------------------------

// ATUALIZAR----------------------------------------------

// DELETAR----------------------------------------------

// OUTROS----------------------------------------------
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