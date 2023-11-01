<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth {
    protected $ci;

    public function __construct() {
        $this->ci =& get_instance();

        $this->ci->load->library('session');
        $this->ci->load->helper('language');
        $this->ci->lang->load('variaveis_lang', 'portuguese');
    }

// =========================================================================================================
// ========================================= -- GERAR CODIGO -- ============================================

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

// =========================================================================================================
// ========================================= -- REQUEST CODE -- ============================================

    public function get_code_dashboard_app() {
        $client_id = $this->ci->lang->line('client_id');
        $secret = $this->ci->lang->line('client_id');
        $codes = json_decode($this->generateCodes(), true);
        $code_verifier = $codes['code_verifier'];
        $code_challenge = $codes['code_challenge'];

        $url = $this->ci->lang->line('authorize_url') . 'response_type=code&code_challenge=' . $code_challenge . '&code_challenge_method=S256&client_id=' . $client_id . '&redirect_uri=' . $this->ci->lang->line('endpoint_app_dashboard');

        $session_code = array (
            'client_id' => $this->ci->lang->line('client_id'),
            'client_secret' => $this->ci->lang->line('client_secret'),
            'code_verifier' => $codes['code_verifier'],
            'code_challenge' => $codes['code_challenge']
        );
        $this->ci->session->set_userdata($session_code);

        return $url;
    }

    public function get_code_paciente_exames() {
        // $this->ci->lang->load('variaveis_lang', 'portuguese');
        $client_id = $this->ci->lang->line('exames_id');
        $secret = $this->ci->lang->line('exames_secret');
        $codes = json_decode($this->generateCodes(), true);
        $code_verifier = $codes['code_verifier'];
        $code_challenge = $codes['code_challenge'];

        $url = $this->ci->lang->line('authorize_url') . 'response_type=code&code_challenge=' . $code_challenge . '&code_challenge_method=S256&client_id=' . $client_id . '&redirect_uri=' . $this->ci->lang->line('endpoint_app_exames_paciente');

        $session_code = array (
            'client_id' => $this->ci->lang->line('exames_id'),
            'client_secret' => $this->ci->lang->line('exames_secret'),
            'code_verifier' => $codes['code_verifier'],
            'code_challenge' => $codes['code_challenge']
        );
        $this->ci->session->set_userdata($session_code);

        return $url;
    }

    public function get_exames_lista() {
        // $this->ci->lang->load('variaveis_lang', 'portuguese');
        $client_id = $this->ci->lang->line('exames_lista_id');
        $secret = $this->ci->lang->line('exames_lista_secret');
        $codes = json_decode($this->generateCodes(), true);
        $code_verifier = $codes['code_verifier'];
        $code_challenge = $codes['code_challenge'];

        $url = $this->ci->lang->line('authorize_url') . 'response_type=code&code_challenge=' . $code_challenge . '&code_challenge_method=S256&client_id=' . $client_id . '&redirect_uri=' . $this->ci->lang->line('endpoint_app_exames_lista');

        $session_code = array (
            'client_id' => $this->ci->lang->line('exames_lista_id'),
            'client_secret' => $this->ci->lang->line('exames_lista_secret'),
            'code_verifier' => $codes['code_verifier'],
            'code_challenge' => $codes['code_challenge']
        );
        $this->ci->session->set_userdata($session_code);

        return $url;
    }

// ==========================================================================================================
// ========================================= -- REQUEST TOKEN -- ============================================

    public function get_token_pacientes_lista() {
        $code = $this->input->post('code'); // var 6

        $url = $this->ci->lang->line('request_token_url');

        $data_request = array(
            'client_id' => $this->ci->session->userdata('client_id'), // 1
            'client_secret' => $this->ci->session->userdata('client_secret'), // 2
            'code_verifier' => $this->ci->session->userdata('code_verifier'), // 3
            'code_challenge' => $this->ci->session->userdata('code_challenge'), // 4
            'code' => $code,
            'redirect_uri' => $this->ci->lang->line('endpoint_app_dashboard'),
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

    public function get_token_exames_lista() {
        $code = $this->input->post('code'); // var 6

        $url = $this->ci->lang->line('request_token_url');

        $data_request = array(
            'client_id' => $this->ci->session->userdata('client_id'), // 1
            'client_secret' => $this->ci->session->userdata('client_secret'), // 2
            'code_verifier' => $this->ci->session->userdata('code_verifier'), // 3
            'code_challenge' => $this->ci->session->userdata('code_challenge'), // 4
            'code' => $code,
            'redirect_uri' => $this->ci->lang->line('endpoint_app_dashboard'),
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

    public function get_token_exames_paciente() {
        $code = $this->input->post('code'); // var 6

        $url = $this->ci->lang->line('request_token_url');

        $data_request = array(
            'client_id' => $this->ci->session->userdata('client_id'), // 1
            'client_secret' => $this->ci->session->userdata('client_secret'), // 2
            'code_verifier' => $this->ci->session->userdata('code_verifier'), // 3
            'code_challenge' => $this->ci->session->userdata('code_challenge'), // 4
            'code' => $code,
            'redirect_uri' => $this->ci->lang->line('endpoint_app_exames_paciente'),
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

// =============================================================================================================
// ========================================= -- RECURSOS (DADOS) -- ============================================

// RETORNA LISTA DE PACIENTES ASSOCIADOS AO LAB ========================================================================
    public function get_pacientes_lista ($access_token,$id_laboratorio) {
        $url = $this->ci->lang->line('endpoint_api_dados_pacientes_lista') . '?id_laboratorio=' . $id_laboratorio;

        $options = array(
            'http' => array(
                'method'  => 'GET',
                'header' => 'Authorization: Bearer ' . $access_token
            )
        );

        $context  = stream_context_create($options);
        $pacientes_lista_json = file_get_contents($url, false, $context);
        if ($pacientes_lista_json === FALSE) {};

        return $pacientes_lista_json;
    }

// FUNÇÃO PARA BUSCAR PACIENTE POR IDENTIFICADOR =======================================================================
    public function get_dados_paciente () {
        $access_token = $this->input->post('access_token');
        $identificador_paciente = $this->input->post('identificador_paciente');
        $tipo_identificador = $this->input->post('tipo_identificador');

        $url = $this->ci->lang->line('endpoint_api_dados_paciente') . '?identificador_paciente=' . $identificador_paciente . '&tipo_identificador=' . $tipo_identificador;

        $options = array(
            'http' => array(
                'method'  => 'GET',
                'header' => 'Authorization: Bearer ' . $access_token
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) {};

        return $result;
    }

// BUSCA DE EXAMES ASSOCIADOS A UM PACIENTE ============================================================================
    public function get_dados_exames_paciente () {
        $access_token = $this->input->post('access_token');
        $id_paciente = $this->input->post('id_paciente');

        $url = $this->ci->lang->line('endpoint_api_dados_exames_paciente') . '?id_paciente=' . $id_paciente;

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

// RETORNA LISTA DE EXAMES ASSOCIADOS AO LAB ========================================================================
    public function get_dados_exames_lista ($access_token, $id_laboratorio) {
        $url = $this->ci->lang->line('endpoint_api_dados_exames_lista') . '?id_laboratorio=' . $id_laboratorio;

        $options = array(
            'http' => array(
                'method'  => 'GET',
                'header' => 'Authorization: Bearer ' . $access_token
            )
        );

        $context  = stream_context_create($options);
        $pacientes_lista_json = file_get_contents($url, false, $context);
        if ($pacientes_lista_json === FALSE) {};

        return $pacientes_lista_json;
    }
}