<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
// ================================================================================================
// ========================================= -- SET -- ============================================

// ================================================================================================
// ========================================= -- GET -- ============================================

// ================================================================================================
// ========================================= -- UPDATE -- =========================================

// ================================================================================================
// ========================================= -- DELETE -- =========================================

// ================================================================================================
// ========================================= -- OUTRAS -- =========================================
    function __construct() { 
        parent::__construct(); 

        // Load models
        $this->load->model('login_model');

        // Load bibliotecas
        $this->load->library('email');
        $this->load->library('form_validation');

        require __DIR__ .'\..\..\system\libraries\mailer\PHPMailerAutoload.php';
        
        // Load language
        $this->load->helper('language');
        $this->lang->load('variaveis_lang', 'portuguese');

        $this->load->helper('form');
        $this->load->helper('security');
    } 

	public function index(){
        if($this->autenticarUsuario()){
			redirect('dashboard');
		}else{
            $this->lang->load('variaveis_lang', 'portuguese');
            $this->load->view('includes/html_header');
            $this->load->view('login/login'); 
		}

    }
    
	public function login(){
        $email = $this->input->post('email');
        $senha = $this->input->post('senha');
        $validado = $this->login_model->validarLogin($email, $senha);
        if ($this->output->set_output($validado) == 'TRUE') {
            redirect('dashboard');
        };
    }

    public function logout() {
        $array_items = array('id_usuario_autenticacao' => '', 'email' => '', 'nome' => '', 'logado' => '');
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
        redirect('login');
    }

    // public function recuperarSenha(){
    //     $this->load->view('includes/html_header');
    //     $this->load->view('login/recuperar_senha');
    //     $this->load->view('includes/html_footer');
    // }

    public function autenticarUsuario(){
        $logado = $this->session->userdata('logado');
        if($logado){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function enviarEmail(){
        //dados do post: email, mensagem, assunto, resetar_senha(sim, não)
        //retornos: 204(não exite usuario), 500(Erro ao enviar email), 200(Ok)
        $email = $this->input->post('email');
        $resetar_senha = $this->input->post('resetar_senha');
        
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        if($resetar_senha == 'sim'){
            $nova_senha = $this->login_model->resetar_senha($email);
            if($nova_senha == FALSE){
                $this->output->set_output('204');
            }else{
                $nome_retorno = 'Davi Saúde';
                $email_retorno = 'sac.davisaude@gmail.com';
                $destinatario = $email;
                $mensagem = "Atenção! Sua senha é individual, sigilosa e instransferível. Sua nova senha de acesso é: ".$nova_senha.", Recomendamos que troque a senha imediatamente após entrar no sistema. <b></b>";
                $assunto = 'Recuperação de senha';
            }
        }else{
            $nome_retorno = $this->session->userdata('nome');
            $email_retorno = $email;
            $destinatario = 'sac.davisaude@gmail.com';
            $mensagem = $this->input->post('mensagem');
            $assunto = $this->input->post('assunto');
        }
        $this->load->library('phpmailer_lib');
        $mail = $this->phpmailer_lib->load();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'ssl://smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sac.davisaude@gmail.com';
        $mail->Password = 'kbsqemfplnbqrqlc';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        $mail->CharSet='utf-8';
        $mail->setFrom('sac.davisaude@gmail.com', 'Davi saúde');

        $mail->addReplyTo($email_retorno, $nome_retorno);
        $mail->addAddress($destinatario);
        $mail->Subject = $assunto;

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = $mensagem;
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            $this->monitoramento_usuario_model->setErroSistema($this->session->userdata('id_usuario_autenticacao'), 'enviar email', $nome_retorno+'+'+$email_retorno+'+'+$destinatario+'+'+$mensagem+'+'+$assunto);
            $this->output->set_output('500');
        }else{
            $this->output->set_output('200');
        }
    }
}
