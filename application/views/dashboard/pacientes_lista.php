
<main id="main" class="main">
<!-- =================================================================================================================== -->
<!-- ========================================== -- TÍTULO DA PAGINA -- ================================================= -->
<div class="pagetitle">
    <h1>
        <?php echo lang('consultar_pacientes');?>
    </h1>
    </div>
<!-- ================================================================================================================= -->
<!-- ========================================== -- INICIO SECTION -- ================================================= -->
<section class="section dashboard align-items-center justify-content-center">
    <div class="row justify-content-center">
<!-- ================================================================================================================= -->
<!-- ====================================== -- INICIO COLUNA ESQUERDA -- ============================================= -->
        <div class="col-lg-4">
<!-- ================================================================================================================= -->
<!-- =========================================== -- CARD 01 -- ================================================== -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <?php echo lang('lista_pacientes');?>
                    </h5>

                    <div class="text-center">
                        <div class="col-12">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#ModalListaPacientes" onclick="request_lista_pacientes()">
                                <?php echo lang('acessar');?>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
<!-- ================================================================================================================ -->
        </div><!-- End Left side columns -->
<!-- ================================================================================================================ -->
<!-- ====================================== -- INICIO COLUNA DIREITA -- ============================================= -->
        <div class="col-lg-4">
<!-- ================================================================================================================ -->
<!-- =========================================== -- CARD 02 -- ================================================== -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <?php echo lang('buscar_paciente');?>
                    </h5>

                    <div class="text-center">
                        <div class="col-12">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#ModalBuscaPaciente" >
                                <?php echo lang('acessar');?>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
<!-- ================================================================================================================ -->
        </div><!-- End right side columns -->

    </div>
</section>

<!-- ================================================================================================================= -->
<!-- =============================== SECTION PARA BUSCAR PACIENTES =============================== -->
    <div class="modal fade" id="ModalBuscaPaciente" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">
                        <?php echo lang('buscar_paciente');?>
                        <span>
                            | <?php echo lang('vinculados');?>
                        </span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="text-center">
                    <div class="mb-3">
                        <label for="identificador_paciente" class="form-label">
                            <?php echo lang('identificador_paciente');?>
                        </label>
                        <input type="text" class="form-control text-center" id="identificador_paciente">
                    </div>
                    <fieldset class="mb-3 align-items-center">
                        <legend class="col-form-label col-lg-12 pt-0 text-center">
                            <?php echo lang('tipo_identificador');?>
                        </legend>
                        <div class="row mb-3">
                            <div class="form-check">
                                <input class="" type="radio" name="tipo_identificador" id="tipo_identificador_1" value="cpf">
                                <label class="" for="tipo_identificador_1">
                                    <?php echo lang('cpf');?>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="" type="radio" name="tipo_identificador" id="tipo_identificador_2" value="email">
                                <label class="" for="tipo_identificador_2">
                                    <?php echo lang('email');?>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="" type="radio" name="tipo_identificador" id="tipo_identificador_3" value="celular">
                                <label class="" for="tipo_identificador_3">
                                    <?php echo lang('celular');?>
                                </label>
                            </div>
                        </div>
                    </fieldset>
                </div>

                <div class="modal-body">
                    <table class="table table-borderless datatable" id="table_busca_paciente" style="display:none">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <?php echo lang('nome');?>
                                </th>
                                <th scope="col">
                                    <?php echo lang('sobrenome');?>
                                </th>
                                <th scope="col">
                                    <?php echo lang('email');?>
                                </th>
                                <th scope="col">
                                    <?php echo lang('celular');?>
                                </th>
                                <th scope="col">
                                    <?php echo lang('acoes');?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <?php echo lang('fechar');?>
                    </button>
                    <button class="btn btn-primary" onclick="request_paciente()">
                        <?php echo lang('buscar');?>
                    </button>
                </div>
            </div>
        </div>
    </div>

<!-- =============================== LISTA DE PACIENTES - fim =============================== -->
<!-- ================================================================================================================= -->
<!-- =============================== MODAL PARA MOSTRAR TODOS PACIENTES =============================== -->

    <div class="modal fade" id="ModalListaPacientes" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">
                        <?php echo lang('lista_pacientes');?>
                        <span>
                            | <?php echo lang('vinculados');?>
                        </span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <?php echo lang('nome');?>
                                </th>
                                <th scope="col">
                                    <?php echo lang('sobrenome');?>
                                </th>
                                <th scope="col">
                                    <?php echo lang('email');?>
                                </th>
                                <th scope="col">
                                    <?php echo lang('celular');?>
                                </th>
                                <th scope="col">
                                    <?php echo lang('acoes');?>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="table_todos_pacientes">
                            
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <?php echo lang('fechar');?>
                    </button>
                </div>
            </div>
        </div>
    </div>

<!-- =============================== LISTA DE PACIENTES - fim =============================== -->

</main><!-- End #main -->

    <!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
    &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/chart.js/chart.umd.js"></script>
<script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/echarts/echarts.min.js"></script>
<script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/quill/quill.min.js"></script>
<script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/php-email-form/validate.js"></script>

    <script>
        let dados_paciente = new Array();
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);

        function request_code() {
            $.ajaxSetup({async:false});
            $.post("<?php echo site_url('auth/request_code');?>",{},
                function(data, status) {
                    if(data) {
                        // console.log(data);
                        location.replace(data);
                    }
                } // Fecha function
            ); // fecha POST
        }

// As funções de request na API foram separadas para especificar cada tipo de requisição
// Requisições para lista de pacientes
        function request_lista_pacientes() {
            const code = urlParams.get('code'); // 6
            $.post("<?php echo site_url('auth/request_token');?>",{code:code},
                function(data, status) {
                    if(data) {
                        tokens = JSON.parse(data);

                        recources_lista_pacientes(tokens['access_token']);
                    }
                } // Fecha function
            ); // fecha POST
        }

        function recources_lista_pacientes(access_token) {
            // REQUEST RESOURCES
            $.ajaxSetup({async:false});
            $.post("<?php echo site_url('auth/recources_lista_pacientes');?>",{access_token:access_token},
                function(data, status) {
                    if(data) {
                        exibir_pacientes(data);
                    }
                } // Fecha function
            ); // fecha POST
        }

        function exibir_pacientes(data) {
            // Pega id da tabela que será montada com os dados que vem da API
            table_todos_pacientes = document.getElementById('table_todos_pacientes');
            
            dados = data;
            dados_pacientes = JSON.parse(data);
            for (var i = 0; i < dados_pacientes.length; i++) {
                // Para cada paciente que vem da consulta, verifica se o paciente está vinculado ao laboratório
                $.post("<?php echo site_url('dashboard/verifica_paciente');?>",{id_paciente:dados_pacientes[i]['id_usuario_autenticacao']},
                function(data, status) {
                    if(data == true) {
                        dados_paciente = JSON.stringify(dados_pacientes[i]); // Dados que serão enviados para exibir perfil do paciente
                        const linha = document.createElement('tr');

                        const paciente_id = document.createElement('td');
                        paciente_id.style.display = 'none';
                        const paciente_nome = document.createElement('td');
                        const paciente_sobrenome = document.createElement('td');
                        const paciente_email = document.createElement('td');
                        const paciente_celular = document.createElement('td');

                        const paciente_acoes = document.createElement('td');
                        const link_paciente_perfil = document.createElement('a');
                        const icon_paciente_perfil = document.createElement('i');
                        icon_paciente_perfil.setAttribute('class', 'bi bi-person');
                        link_paciente_perfil.appendChild(icon_paciente_perfil);
                        link_paciente_perfil.setAttribute('class','nav-link');
                        link_paciente_perfil.setAttribute('href','');
                        link_paciente_perfil.setAttribute('onclick', "paciente_perfil("+
                            dados_paciente
                            +");return false;");
                            
                        paciente_acoes.appendChild(link_paciente_perfil);

                        paciente_nome.innerHTML = dados_pacientes[i]['nome'];
                        paciente_sobrenome.innerHTML = dados_pacientes[i]['sobrenome'];
                        paciente_email.innerHTML = dados_pacientes[i]['email'];
                        paciente_celular.innerHTML = dados_pacientes[i]['celular'];

                        // linha.appendChild(paciente_id);
                        linha.appendChild(paciente_nome);
                        linha.appendChild(paciente_sobrenome);
                        linha.appendChild(paciente_email);
                        linha.appendChild(paciente_celular);
                        linha.appendChild(paciente_acoes);
                        table_todos_pacientes.appendChild(linha);
                    }
                } // Fecha function
                ); // fecha POST
            }
        }

// Requisições para busca de paciente único
        // Abre menu de busca
        function abrir_menu_busca() {
            menu_busca_paciente = document.getElementById('menu_busca_paciente');
            menu_busca_paciente.style.display = 'block';
        }

        // Requisita token para busca
        function request_paciente() {
            const code = urlParams.get('code'); // 6
            $.post("<?php echo site_url('auth/request_token');?>",{code:code},
                function(data, status) {
                    if(data) {
                        tokens = JSON.parse(data);
                        resource_paciente(tokens['access_token']);
                    }
                } // Fecha function
            ); // fecha POST
        }

        function resource_paciente(acess_token) {
            identificador_paciente = document.getElementById('identificador_paciente').value;
            tipo_identificador = document.getElementsByName('tipo_identificador');
            identificador_value = Array.from(tipo_identificador).find(radio => radio.checked).value;

            $.post("<?php echo site_url('auth/resource_paciente');?>",{acess_token:acess_token, identificador_paciente:identificador_paciente, tipo_identificador:identificador_value},
                function(data, status) {
                    if(data) {
                        const table_busca_paciente = document.getElementById('table_busca_paciente');
                        table_busca_paciente.style.display = 'table';

                        dados_paciente = JSON.parse(data);
                        console.log(dados_paciente);
                        $.post("<?php echo site_url('dashboard/verifica_paciente');?>",{id_paciente:dados_paciente['id_usuario_autenticacao']},
                        function(data, status) {
                            if(data == true) {
                                dados_paciente_stringify = JSON.stringify(dados_paciente);
                                const linha = document.createElement('tr');

                                const paciente_id = document.createElement('td');
                                paciente_id.style.display = 'none';
                                const paciente_nome = document.createElement('td');
                                const paciente_sobrenome = document.createElement('td');
                                const paciente_email = document.createElement('td');
                                const paciente_celular = document.createElement('td');

                                const paciente_acoes = document.createElement('td');
                                const link_paciente_perfil = document.createElement('a');
                                const icon_paciente_perfil = document.createElement('i');
                                icon_paciente_perfil.setAttribute('class', 'bi bi-person');
                                link_paciente_perfil.appendChild(icon_paciente_perfil);
                                link_paciente_perfil.setAttribute('class','nav-link');
                                link_paciente_perfil.setAttribute('href','');
                                link_paciente_perfil.setAttribute('onclick', "paciente_perfil("+
                                    dados_paciente_stringify
                                    +");return false;");

                                paciente_acoes.appendChild(link_paciente_perfil);

                                paciente_nome.innerHTML = dados_paciente['nome'];
                                paciente_sobrenome.innerHTML = dados_paciente['sobrenome'];
                                paciente_email.innerHTML = dados_paciente['email'];
                                paciente_celular.innerHTML = dados_paciente['celular'];

                                // linha.appendChild(paciente_id);
                                linha.appendChild(paciente_nome);
                                linha.appendChild(paciente_sobrenome);
                                linha.appendChild(paciente_email);
                                linha.appendChild(paciente_celular);
                                linha.appendChild(paciente_acoes);
                                table_busca_paciente.appendChild(linha);
                            }
                        } // Fecha function
                        ); // fecha POST
                    }
                } // Fecha function
                ); // fecha POST
        }

// Função para atualizar a pagina solicitando novo code ao fechar modal
        $('#ModalListaPacientes').on('hidden.bs.modal', function () {
            request_code();
        });

        $('#ModalBuscaPaciente').on('hidden.bs.modal', function () {
            request_code();
        });

        function paciente_perfil(dados_paciente) {
            dados = {
                'paciente_id': dados_paciente['id_usuario_autenticacao'],
                'paciente_nome': dados_paciente['nome'],
                'paciente_sobrenome': dados_paciente['sobrenome'],
                'paciente_celular': dados_paciente['celular'],
                'paciente_email': dados_paciente['email']
            }

            $.ajaxSetup({async:false});
            $.post("<?php echo site_url('dashboard/paciente_perfil');?>",{dados_paciente:dados},
                function(data, status) {
                    if(data) {
                        // Redireciona para perfil do paciente
                        // window.location.href = '<?php echo site_url('dashboard/paciente_perfil'); ?>';

                        $.ajaxSetup({async:false});
                        $.post("<?php echo site_url('auth/request_code_exames');?>",{},
                            function(data, status) {
                                if(data) {
                                    // console.log(data);
                                    location.replace(data);
                                }
                            } // Fecha function
                        ); // fecha POST
                    }
                } // Fecha function
            ); // fecha POST
        }
    </script>
</body>
