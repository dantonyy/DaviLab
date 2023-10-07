<?php $this->lang->load(['html_footer_lang','dashboard_lang'], 'portuguese');?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicons -->
    <link href="<?php echo base_url();?>application/views/dashboard/assets/img/favicon.png" rel="icon">
    <link href="<?php echo base_url();?>application/views/dashboard/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url();?>application/views/dashboard/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>application/views/dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url();?>application/views/dashboard/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>application/views/dashboard/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo base_url();?>application/views/dashboard/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo base_url();?>application/views/dashboard/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url();?>application/views/dashboard/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url();?>application/views/dashboard/assets/css/style.css" rel="stylesheet">
    
    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: Sep 18 2023 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>
<!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?php echo site_url('dashboard/');?>" class="logo d-flex align-items-center">
                <img src="<?php echo base_url();?>application/views/dashboard/assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">
                    <?php echo lang('davilab');?>
                </span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

    <!-- ======= menu pesquisa ======= -->
        <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
                <i class="bi bi-search"></i>
            </a>
            </li><!-- End Search Icon-->

    <!-- ======= NOTIFICATION  ======= -->
            <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-bell"></i>
                <!-- <span class="badge bg-primary badge-number"> -->
                    <!-- Quantidade de notificações -->
                <!-- </span> -->
            </a><!-- End Notification Icon -->

        <!-- ======= NOTIFICATIONS DROPDOWN ======= -->
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                <li class="dropdown-header">
                You have 4 new notifications
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="notification-item">
                <i class="bi bi-exclamation-circle text-warning"></i>
                <div>
                    <h4>Lorem Ipsum</h4>
                    <p>Quae dolorem earum veritatis oditseno</p>
                    <p>30 min. ago</p>
                </div>
                </li>

                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="notification-item">
                <i class="bi bi-x-circle text-danger"></i>
                <div>
                    <h4>Atque rerum nesciunt</h4>
                    <p>Quae dolorem earum veritatis oditseno</p>
                    <p>1 hr. ago</p>
                </div>
                </li>

                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="notification-item">
                <i class="bi bi-check-circle text-success"></i>
                <div>
                    <h4>Sit rerum fuga</h4>
                    <p>Quae dolorem earum veritatis oditseno</p>
                    <p>2 hrs. ago</p>
                </div>
                </li>

                <li>
                <hr class="dropdown-divider">
                </li>

                <li class="notification-item">
                <i class="bi bi-info-circle text-primary"></i>
                <div>
                    <h4>Dicta reprehenderit</h4>
                    <p>Quae dolorem earum veritatis oditseno</p>
                    <p>4 hrs. ago</p>
                </div>
                </li>

                <li>
                <hr class="dropdown-divider">
                </li>
                <li class="dropdown-footer">
                <a href="#">Show all notifications</a>
                </li>

            </ul><!-- End Notification Dropdown Items -->

            </li>
    <!-- End Notification Nav -->

    <!-- ======= PERFIL DROPDOWN ======= -->    
            <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img src="<?php echo base_url();?>application/views/dashboard/assets/img/foto_perfil.jpg" alt="Profile" class="rounded-circle">
                <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $this->session->userdata('nome'); ?></span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                <h6>
                    <?php echo $this->session->userdata('nome') . ' ' . $this->session->userdata('sobrenome'); ?>
                </h6>
                <span>
                    <?php echo $this->session->userdata('nome_fantasia'); ?>
                </span>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo site_url('dashboard/configuracoes');?>">
                    <i class="bi bi-gear"></i>
                    <span>
                        <?php echo lang('configuracoes');?>
                    </span>
                </a>
                </li>
                <li>
                <hr class="dropdown-divider">
                </li>

                <li>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo site_url('login/logout');?>">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>
                        <?php echo lang('sair');?>
                    </span>
                </a>
                </li>

            </ul><!-- End Profile Dropdown Items -->
            </li>
    <!-- End Profile Nav -->

        </ul>
        </nav><!-- End Icons Navigation -->

    </header>
<!-- End Header -->

<!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="<?php echo site_url('dashboard/');?>">
            <i class="bi bi-grid"></i>
            <span>
                <?php echo lang('inicio');?>
            </span>
            </a>
        </li><!-- End Dashboard Nav -->

        
        </li><!-- End Icons Nav -->

        <li id="titulo_painel_adm" class="nav-heading">
            <?php echo lang('painel_adm');?>
        </li>

        <li id="painel_adm" class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>
                <?php echo lang('gerenciar_funcionarios');?>
            </span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="<?php echo site_url('dashboard/painel_adm');?>">
                <i class="bi bi-circle"></i><span>
                    <?php echo lang('lista');?>
                </span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('dashboard/novo_funcionario');?>">
                <i class="bi bi-circle"></i><span>
                    <?php echo lang('adicionar_funcionario');?>
                </span>
                </a>
            </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-heading">
            <?php echo lang('configuracoes');?>
        </li>


        <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo site_url('dashboard/configuracoes');?>">
            <i class="bi bi-gear"></i>
            <span>
                <?php echo lang('configuracoes');?>
            </span>
            </a>
        </li><!-- End Error 404 Page Nav -->

        </ul>

    </aside><!-- End Sidebar-->

<script>
    if ("<?php echo $this->session->userdata('papel') ?>" != 'Administrador') {
        document.getElementById('titulo_painel_adm').style.display = 'none';
        document.getElementById('painel_adm').style.display = 'none';
    }
</script>

<!-- Vendor JS Files -->
<script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/apexcharts/apexcharts.min.js"></script>
<!-- <script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/chart.js/chart.umd.js"></script>
<script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/echarts/echarts.min.js"></script>
<script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/quill/quill.min.js"></script>
<script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url();?>application/views/dashboard/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?php echo base_url();?>application/views/dashboard/assets/js/main.js"></script>