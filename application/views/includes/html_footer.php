
        <!-- ========================================== -- FOOTER -- ================================================= -->
        <footer id="footer" class="footer">

        <div class="copyright">
        <!-- &copy; Copyright <strong><span>DaviLab</span></strong>. All Rights Reserved -->
        </div>

        <div class="credits">

        </div>
        </footer>
        <!-- ================================================================================================================= -->
    </body>
<!-- Vendor JS Files -->
    <script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/quill/quill.min.js"></script>
    <script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url();?>application/views/dashboard/assets/js/main.js"></script>

    <?php 
        // $data['usuario'] = $this->usuario_model->getUsuarioAutenticacao($this->session->userdata('id_usuario'));
        // $usuario_json = json_encode($data['usuario']);
        // echo "<script>var usuario = $usuario_json;</script>";
    ?>

    <script>
        if ("<?php echo $this->session->userdata('papel') ?>" != 'Administrador') {
            document.getElementById('titulo_painel_adm').style.display = 'none';
            document.getElementById('painel_adm').style.display = 'none';
        }

        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);

// =========================================================================================================
// ========================================= -- REQUEST CODE -- ============================================

        function get_code_dashboard_app() {
            $.ajaxSetup({async:false});
            $.post("<?php echo site_url('auth/get_code_dashboard_app');?>",{},
                function(data, status) {
                    if(data) {
                        location.replace(data);
                    }
                } // Fecha function
            ); // fecha POST
        }

        function get_code_exames_lista() {
            $.ajaxSetup({async:false});
            $.post("<?php echo site_url('auth/get_code_exames_lista');?>",{},
                function(data, status) {
                    if(data) {
                        // console.log(data);
                        location.replace(data);
                    }
                } // Fecha function
            ); // fecha POST
        }

// ==========================================================================================================
// ========================================= -- REQUEST TOKEN -- ============================================

        function get_token_pacientes_lista() {
            const code = urlParams.get('code'); // 6
            $.post("<?php echo site_url('auth/get_token_pacientes_lista');?>",{code:code},
                function(data, status) {
                    if(data) {
                        tokens = JSON.parse(data);

                        get_pacientes_lista(tokens['access_token']);
                    }
                } // Fecha function
            ); // fecha POST
        }

        function get_token_exames_lista() {
            const code = urlParams.get('code'); // 6
            $.post("<?php echo site_url('auth/get_token_pacientes_lista');?>",{code:code},
                function(data, status) {
                    if(data) {
                        tokens = JSON.parse(data);

                        get_exames_lista(tokens['access_token']);
                    }
                } // Fecha function
            ); // fecha POST
        }

// =============================================================================================================
// ========================================= -- RECURSOS (DADOS) -- ============================================

        function get_pacientes_lista(access_token) {
            // REQUEST RESOURCES
            $.ajaxSetup({async:false});
            $.post("<?php echo site_url('dashboard/pacientes_lista');?>",{access_token:access_token},
                function(data, status) {
                    if(data) {
                        $.ajax({
                            url: "<?php echo site_url('dashboard/pacientes_lista/');?>",
                            dataType: "json",
                            async: false
                        }).responseText;
                        location.replace("<?php echo base_url('dashboard/pacientes_lista/');?>");
                    }
                } // Fecha function
            ); // fecha POST
        }

        function get_exames_lista(access_token) {
            // REQUEST RESOURCES
            $.ajaxSetup({async:false});
            $.post("<?php echo site_url('exames/');?>",{access_token:access_token},
                function(data, status) {
                    if(data) {
                        $.ajax({
                            url: "<?php echo site_url('exames/');?>",
                            dataType: "json",
                            async: false
                        }).responseText;
                        location.replace("<?php echo base_url('exames/');?>");
                    }
                } // Fecha function
            ); // fecha POST
        }
    </script>


</html>