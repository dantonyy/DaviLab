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

    $lang['client_id'] = "girIMRFfNWVGD7uzK7QEsE8oJmtUdzXIcrxrjAmR";
    $lang['client_secret'] = "9siRj4kr751jGYZQbVuhAhN8aZgq8Wo8FqwhzTDNrLY9ES4IwH6Aq2fP8GEuEKrcT9qpYyO62d83ps1pEJRiAHfJUKj3QniIST2pceANPNClG1BFQoAcmCapGMXpby33";

    $lang['exames_id'] = "dhvOC5wkn1S1AOKTzM7KMsBBKVR3S0V03Ent3S0d";
    $lang['exames_secret'] = "T70A2du2QUvG2ULi4IPj3txPJuU2wyTL0WNYRHLLEOVIrw07P6XP7znxZ65uS1ONczjfYoGckqwRcn3UxRNrJamF8tkN4nvJ1EjhVz4IMzSFllz7nJkTKsuuuzz91JGB";

    $lang['exames_lista_id'] = "bj2F7fWknemhQQInKR7U6RrGyBNH8Mqf0S42kJm3";
    $lang['exames_lista_secret'] = "h6cX89GQyL74iNHsV3mbFdz9t5GMJA7T3zBTrdkFlbwXxM815BpcK9JheG4sIr0Fzha7LNBUeuqws91W5R3zG8chXOopeyieAFtIf1I8KXs3TSaQLQfTWYiNRRfjYdTD";

    $lang['foto_perfil'] = "";
?>