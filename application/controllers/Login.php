<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
// SET----------------------------------------------
// GET----------------------------------------------
// ATUALIZAR ----------------------------------------------
// DELETAR----------------------------------------------
// OUTROS----------------------------------------------

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
    
	public function login($nome=NULL, $email=NULL, $celular=NULL){
        $email = $this->input->post('email');
        $senha = $this->input->post('senha');
        $validado = $this->login_model->validarLogin($email, $senha);
        $this->output->set_output($validado);
    }

    public function logout() {
        $array_items = array('id_usuario' => '', 'email' => '', 'nome' => '', 'logado' => '');
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
        redirect('login');
    }

    public function recuperarSenha(){
        $this->load->view('includes/html_header');
        $this->load->view('login/recuperar_senha');
        $this->load->view('includes/html_footer');
    }

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
            $this->monitoramento_usuario_model->setErroSistema($this->session->userdata('id_usuario'), 'enviar email', $nome_retorno+'+'+$email_retorno+'+'+$destinatario+'+'+$mensagem+'+'+$assunto);
            $this->output->set_output('500');
        }else{
            $this->output->set_output('200');
        }
    }

// ---------------------------------------------------------------- Autenticação OAuth

    // Gera code_verifier e code_challenge para verificação do token
    public function generateCodes() {
        $code_verifier = '';
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        // Gerar um código_verifier aleatório com comprimento entre 43 e 128 caracteres
        $length = rand(43, 128);
        for ($i = 0; $i < $length; $i++) {
            $code_verifier .= $characters[rand(0, strlen($characters) - 1)];
        }

        // Codificar o code_verifier em base64url
        $code_verifier = base64_encode($code_verifier);
        $code_verifier = str_replace(['+', '/', '='], ['-', '_', ''], $code_verifier);

        // Calcular o code_challenge usando sha256
        $code_challenge = hash('sha256', $code_verifier, true);

        // Codificar o code_challenge em base64url
        $code_challenge = base64_encode($code_challenge);
        $code_challenge = str_replace(['+', '/', '='], ['-', '_', ''], $code_challenge);

        $codes = array(
            'code_verifier' => $code_verifier,
            'code_challenge' => $code_challenge
        );
        
        $data = json_encode($codes);
        return $data;
    }

    public function request_code() {
        $client_id = $this->lang->line('client_id');
        $secret = $this->lang->line('client_id');
        $codes = json_decode($this->generateCodes(), true);
        $code_verifier = $codes['code_verifier'];
        $code_challenge = $codes['code_challenge'];

        $url = $this->lang->line('authorize_url') . 'response_type=code&code_challenge=' . $code_challenge . '&code_challenge_method=S256&client_id=' . $client_id . '&redirect_uri=' . $this->lang->line('dominio');

        $session_code = array (
            'client_id' => $this->lang->line('client_id'),
            'client_secret' => $this->lang->line('client_secret'),
            'code_verifier' => $codes['code_verifier'],
            'code_challenge' => $codes['code_challenge']
        );
        $this->session->set_userdata($session_code);

        $this->output->set_output($url);
    }

    public function request_token() {
        // Pegar dados que retornam da pagina de login usuario->usp
        $client_id = $this->session->userdata('client_id'); // 1
        $client_secret = $this->session->userdata('client_secret'); // 2
        $code_verifier = $this->session->userdata('code_verifier'); // 3
        $code_challenge = $this->session->userdata('code_challenge'); // 4
        $code = $this->input->post('code'); // var 6

        // $url = $this->lang->line('request_token_url') . 'client_id=' . $client_id . '&client_secret=' . $client_secret . '&code_verifier=' . $code_verifier . '&code_challenge=' . $code_challenge . '&code=' . $code;
        $url = $this->lang->line('request_token_url');

        $data_request = array(
            'client_id' => $this->session->userdata('client_id'), // 1
            'client_secret' => $this->session->userdata('client_secret'), // 2
            'code_verifier' => $this->session->userdata('code_verifier'), // 3
            'code_challenge' => $this->session->userdata('code_challenge'), // 4
            'code' => $code,
            'redirect_uri' => $this->lang->line('dominio'),
            "grant_type" => "authorization_code",
        );

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'Accept' => '*/*',
                // 'Host' => $this->lang->line('dominio'),
                'content' => http_build_query($data_request)
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {};

        $this->output->set_output($result);
    }

    public function resources () {
        $access_token = $this->input->post('access_token');

        $url = $this->lang->line('resource_url');

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'header'  => "Authorization: Bearer $access_token\r\n",
                'method'  => 'GET',
                'Accept' => '*/*',
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {};

        $this->output->set_output($result);
    }
}
