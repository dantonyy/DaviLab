<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    $lang['davilab'] = 'Davi Lab';
    $lang['login'] = 'Login';
    $lang['senha'] = 'Senha';
    $lang['campo_obrigatorio'] = 'O preenchimento deste campo é obrigatório.';
    $lang['entrar'] = 'Entrar';

// --------------------------------------------------------------------------------------------------------------
// ----------------------------------------------- ENDPOINTS ----------------------------------------------------
    $lang['dominio'] = "http://localhost/davilab/";

    // ============= -- OAuth URLs -- =============
    
    // APP Endpoints para onde API redireciona redireciona com OAuth Code requisitado
    $lang['endpoint_app_dashboard'] = "http://localhost/davilab/dashboard/";
    $lang['endpoint_app_exames_paciente'] = "http://localhost/davilab/dashboard/paciente_perfil";
    $lang['endpoint_app_exames_lista'] = "http://localhost/davilab/exames";

    // API Endpoint que retorna OAuth token
    $lang['authorize_url'] = "http://127.0.0.1:8000/auth/authorize/?";
    // API Endpoint retorna OAuth Acess Token
    $lang['request_token_url'] = "http://127.0.0.1:8000/auth/token/";
    
    // API Endpoints que retornam resources/recursos (dados requisitados)
    $lang['endpoint_api_dados_pacientes_fhir'] = "http://127.0.0.1:8000/get_pacientes_fhir/";
    $lang['endpoint_api_dados_pacientes_lista'] = "http://127.0.0.1:8000/get_pacientes_lista/";
    $lang['endpoint_api_dados_paciente'] = "http://127.0.0.1:8000/get_paciente/";    
    $lang['endpoint_api_dados_exames_paciente'] = "http://127.0.0.1:8000/get_exame/";
    $lang['endpoint_api_dados_exames_lista'] = "http://127.0.0.1:8000/get_exames_lista/";

    // API Endpoints - funções de set / adicionar
    $lang['endpoint_api_novo_paciente'] = "http://127.0.0.1:8000/set_paciente/";
    $lang['endpoint_api_novo_exame'] = "http://127.0.0.1:8000/set_exame/";
    $lang['endpoint_api_novoExameArquivo'] = "http://127.0.0.1:8000/set_exame_arquivo/";

// ------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------- APP VARIAVEIS ----------------------------------------------------
// Importante lembrar que o client_secret deve ser copiado no momento de registrar aplicação, antes que fique criptografado

    $lang['client_id'] = "1f0O0OjCWTLwvHenINqRXvSrk4ClgTsO1xCAvLZd";
    $lang['client_secret'] = "5BO5itPD2UHVAuhnpwvJHfe4d8bN5LStZyBLv7AdhSTMgNY5Nv6hbLSbA4J3H7d8zTOTbz4EmTS4wsu7avhstsT1u0l69SroTrxnckfsiEq6v4BWQ30MEQefOaVn5yDe";

    $lang['exames_id'] = "vzoF3rzpTfDiv1H7tfAg4EWUxfsEvA2FwUHWhFcI";
    $lang['exames_secret'] = "rTZLC17ae5vuMB4ohIvZYEbdNklgSYcdlDU8i1l58IliLW7QyRGukKhHfZzrnwVVUBfSYJQoRefZS310anTchgFEcaJo4zqJqtkeG0bA6Vy75N6iMOoRXGKYAOOarwYn";

    $lang['exames_lista_id'] = "1xGDwsKBoFjs60PuLZfGl4RKWF7iC7z9lwu4SwCw";
    $lang['exames_lista_secret'] = "Svz44heRyjJIND6zcgScToP6Z50zupvyb7epdGxhkWLoPs0fIBaFLTZAaaVMwOz3B6A9tRnzdwOwxNVEm4kgCle5o39mhlsQvvv0hIQUAQhTGlzLYc96ovpvRV7fzbbd";

    $lang['foto_perfil'] = "";
?>