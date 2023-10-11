<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('language');
        $this->lang->load('variaveis_lang', 'portuguese');
    }
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

        $url = $this->lang->line('authorize_url') . 'response_type=code&code_challenge=' . $code_challenge . '&code_challenge_method=S256&client_id=' . $client_id . '&redirect_uri=' . $this->lang->line('oauth_endpoint');

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

        $url = $this->lang->line('request_token_url');

        $data_request = array(
            'client_id' => $this->session->userdata('client_id'), // 1
            'client_secret' => $this->session->userdata('client_secret'), // 2
            'code_verifier' => $this->session->userdata('code_verifier'), // 3
            'code_challenge' => $this->session->userdata('code_challenge'), // 4
            'code' => $code,
            'redirect_uri' => $this->lang->line('oauth_endpoint'),
            "grant_type" => "authorization_code",
        );

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'Accept' => '*/*',
                'content' => http_build_query($data_request)
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {};

        $this->output->set_output($result);
    }

    public function recources_lista_pacientes () {
        $access_token = $this->input->post('access_token');
        
        $url = $this->lang->line('recources_lista_pacientes');

        $options = array(
            'http' => array(
                'method'  => 'GET',
                'header' => 'Authorization: Bearer ' . $access_token
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {};

        $this->output->set_output($result);
    }

    public function resource_paciente () {
        $access_token = $this->input->post('access_token');
        $identificador_paciente = $this->input->post('identificador_paciente');
        $tipo_identificador = $this->input->post('tipo_identificador');

        $url = $this->lang->line('resource_paciente') . '?identificador_paciente=' . $identificador_paciente . '&tipo_identificador=' . $tipo_identificador;

        $options = array(
            'http' => array(
                'method'  => 'GET',
                'header' => 'Authorization: Bearer ' . $access_token
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {};

        $this->output->set_output($result);
    }

    // ----------------------------------------------------------------

    public function request_code_exames() {
        $client_id = $this->lang->line('exames_id');
        $secret = $this->lang->line('exames_secret');
        $codes = json_decode($this->generateCodes(), true);
        $code_verifier = $codes['code_verifier'];
        $code_challenge = $codes['code_challenge'];

        $url = $this->lang->line('authorize_url') . 'response_type=code&code_challenge=' . $code_challenge . '&code_challenge_method=S256&client_id=' . $client_id . '&redirect_uri=' . $this->lang->line('exames_endpoint');

        $session_code = array (
            'client_id' => $this->lang->line('exames_id'),
            'client_secret' => $this->lang->line('exames_secret'),
            'code_verifier' => $codes['code_verifier'],
            'code_challenge' => $codes['code_challenge']
        );
        $this->session->set_userdata($session_code);

        $this->output->set_output($url);
    }

    public function request_token_exames() {
        // Pegar dados que retornam da pagina de login usuario->usp
        $client_id = $this->session->userdata('exames_id'); // 1
        $client_secret = $this->session->userdata('exames_secret'); // 2
        $code_verifier = $this->session->userdata('code_verifier'); // 3
        $code_challenge = $this->session->userdata('code_challenge'); // 4
        $code = $this->input->post('code'); // var 6

        $url = $this->lang->line('request_token_url');

        $data_request = array(
            'client_id' => $this->session->userdata('client_id'), // 1
            'client_secret' => $this->session->userdata('client_secret'), // 2
            'code_verifier' => $this->session->userdata('code_verifier'), // 3
            'code_challenge' => $this->session->userdata('code_challenge'), // 4
            'code' => $code,
            'redirect_uri' => $this->lang->line('exames_endpoint'),
            "grant_type" => "authorization_code",
        );

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'Accept' => '*/*',
                'content' => http_build_query($data_request)
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {};

        $this->output->set_output($result);
    }

    public function resource_exames_paciente () {
        $access_token = $this->input->post('access_token');
        $id_paciente = $this->input->post('id_paciente');

        $url = $this->lang->line('get_exame') . '?id_paciente=' . $id_paciente;

        $options = array(
            'http' => array(
                'method'  => 'GET',
                'header' => 'Authorization: Bearer ' . $access_token
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {};

        $this->output->set_output($result);
    }
}
