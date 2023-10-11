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
    // página para qual a API vai redirecionar OAuth Code
    $lang['oauth_endpoint'] = "http://localhost/davilab/dashboard/pacientes_lista";
    $lang['exames_endpoint'] = "http://localhost/davilab/dashboard/paciente_perfil";
    // Página que retorna OAuth token
    $lang['authorize_url'] = "http://127.0.0.1:8000/auth/authorize/?";
    // Página que retorna OAuth Acess Token
    $lang['request_token_url'] = "http://127.0.0.1:8000/auth/token/";
    // Get Pacientes Lista
    $lang['recources_lista_pacientes'] = "http://127.0.0.1:8000/get_pacientes_lista/";
    $lang['resource_paciente'] = "http://127.0.0.1:8000/get_paciente/";
    // Set novo paciente
    $lang['set_paciente'] = "http://127.0.0.1:8000/set_paciente/";
    // Set novo exame
    $lang['set_exame'] = "http://127.0.0.1:8000/set_exame/";
    
    $lang['get_exame'] = "http://127.0.0.1:8000/get_exame/";

// ------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------- APP VARIAVEIS ----------------------------------------------------
// Importante lembrar que o client_secret deve ser copiado no momento de registrar aplicação, antes que fique criptografado

    $lang['client_id'] = "mhe6hgsmCg0vdnki0Kz96lpGXwynp8JkQIBmvWNz";
    $lang['client_secret'] = "EKNz7wdNl1TD84NDT3xsj0y743Fa0imVwj46QO83Q4rAxZXEfqg1poFeLEJtH3loVuOxuhHSeNvhByvP6B4QEdxEn4y8HE6Y10MJjujV4lwzYQs3eg7JlsqDSUCGl026";

    $lang['exames_id'] = "6WT8eCB3BpNnOUSfnWxIVK4yIQCrRoyRuN9XWu32";
    $lang['exames_secret'] = "1nwoiV48jRmQTJJY0HeSvnnDSp0twwfPf8TqQsBEzo4jnXu0lTMGjzeF7XJASsp1MOrsPkiFFuqIsOI01bPLbvtcwVIJ9dmIzjOzMImFZzTziyhky9LIvV5ix9cqB3UL";

    $lang['foto_perfil'] = "";
?>