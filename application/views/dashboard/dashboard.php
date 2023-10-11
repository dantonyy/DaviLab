<?php $this->lang->load(['html_footer_lang','dashboard_lang','errors_html_lang'], 'portuguese');?>

<main id="main" class="main">
<!-- =================================================================================================================== -->
<!-- ========================================== -- TÍTULO DA PAGINA -- ================================================= -->
    <div class="pagetitle">
        <h1>
            <?php echo lang('dashboard');?>
        </h1>
        <!-- <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav> -->
    </div>
<!-- ================================================================================================================= -->
<!-- ========================================== -- INICIO SECTION -- ================================================= -->
    <section class="section dashboard">
    <div class="row">
<!-- ================================================================================================================= -->
<!-- ====================================== -- INICIO COLUNA ESQUERDA -- ============================================= -->
        <div class="col-lg-8">
        <div class="row">
<!-- ================================================================================================================= -->
<!-- =========================================== -- CARD PEQUENO -- ================================================== -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">
                            <!-- Titulo -->
                            <?php echo lang('pacientes');?>
                            <span>
                                <!-- 'Subtitulo' -->
                                | <?php echo lang('cadastrados');?>
                            </span>
                        </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <!-- icon -->
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <!-- Descrição na frente do icone -->
                                <h6>
                                    <?php echo $quantidade_pacientes;?>
                                </h6>
                                <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                                </div>
                        </div>
                    </div>

                </div>
            </div>
<!-- ================================================================================================================= -->
<!-- =========================================== -- CARD GRANDE -- =================================================== -->

            

<!-- ================================================================================================================= -->
<!-- =========================================== -- CARD GRANDE -- =================================================== -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">
                            Histórico de exames submetidos e status
                            <span>
                                | Today
                            </span>
                        </h5>

                        <table class="table table-borderless datatable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row"><a href="#">#2457</a></th>
                                <td>Brandon Jacob</td>
                                <td><a href="#" class="text-primary">At praesentium minu</a></td>
                                <td>$64</td>
                                <td><span class="badge bg-success">Approved</span></td>
                            </tr>
                            <tr>
                                <th scope="row"><a href="#">#2147</a></th>
                                <td>Bridie Kessler</td>
                                <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                                <td>$47</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                            </tr>
                            <tr>
                                <th scope="row"><a href="#">#2049</a></th>
                                <td>Ashleigh Langosh</td>
                                <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                                <td>$147</td>
                                <td><span class="badge bg-success">Approved</span></td>
                            </tr>
                            <tr>
                                <th scope="row"><a href="#">#2644</a></th>
                                <td>Angus Grady</td>
                                <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                                <td>$67</td>
                                <td><span class="badge bg-danger">Rejected</span></td>
                            </tr>
                            <tr>
                                <th scope="row"><a href="#">#2644</a></th>
                                <td>Raheem Lehner</td>
                                <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                <td>$165</td>
                                <td><span class="badge bg-success">Approved</span></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div><!-- End Recent Sales -->
<!-- ================================================================================================================ -->
        </div>
        </div><!-- End Left side columns -->
<!-- ================================================================================================================ -->
<!-- ====================================== -- INICIO COLUNA DIREITA -- ============================================= -->
        <div class="col-lg-4">
<!-- ================================================================================================================ -->
        <div class="card">
            <!-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
            </div> -->

            <div class="card-body">
                <h5 class="card-title">
                    Lista de atividades (?)
                    <span>| Today</span>
                </h5>

                <div class="activity">
                    
                    <!-- Item exemplo -->
                    <div class="activity-item d-flex">
                        <!-- Tempo -->
                        <div class="activite-label">
                            32 min
                        </div>
                        <!-- Cor da bolinha -->
                        <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                        <!-- Descrição -->
                        <div class="activity-content">
                            Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                        </div>
                    </div><!-- End activity item-->

                </div>

            </div>
        </div><!-- End Recent Activity -->
<!-- ================================================================================================================ -->
        <div class="card">
            <!-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                    </li>
                    
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
            </div> -->

            <div class="card-body pb-0">
                <h5 class="card-title">
                    Gráfico porcentagem de exames aceitos (?)
                    <span>
                        | Today
                    </span>
                </h5>

                <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                    echarts.init(document.querySelector("#trafficChart")).setOption({
                        tooltip: {
                        trigger: 'item'
                        },
                        legend: {
                        top: '5%',
                        left: 'center'
                        },
                        series: [{
                        name: 'Access From',
                        type: 'pie',
                        radius: ['40%', '70%'],
                        avoidLabelOverlap: false,
                        label: {
                            show: false,
                            position: 'center'
                        },
                        emphasis: {
                            label: {
                            show: true,
                            fontSize: '18',
                            fontWeight: 'bold'
                            }
                        },
                        labelLine: {
                            show: false
                        },
                        data: [{
                            value: 1048,
                            name: 'Search Engine'
                            },
                            {
                            value: 735,
                            name: 'Direct'
                            },
                            {
                            value: 580,
                            name: 'Email'
                            },
                            {
                            value: 484,
                            name: 'Union Ads'
                            },
                            {
                            value: 300,
                            name: 'Video Ads'
                            }
                        ]
                        }]
                    });
                    });
                </script>

            </div>
        </div><!-- End Website Traffic -->
<!-- ================================================================================================================ -->
        </div><!-- End Right side columns -->

    </div>
    </section>

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

    function request_code() {
        $.ajaxSetup({async:false});
        $.post("<?php echo site_url('auth/request_code');?>",{},
            function(data, status) {
                if(data) {
                    location.replace(data);
                }
            } // Fecha function
        ); // fecha POST
    }

    function request_token() {
        const code = urlParams.get('code'); // 6
        $.post("<?php echo site_url('auth/request_token');?>",{code:code},
            function(data, status) {
                if(data) {
                    tokens = JSON.parse(data);

                    resources(tokens['access_token']);
                }
            } // Fecha function
        ); // fecha POST
    }

    function resources(access_token) {
        // REQUEST RESOURCES
        $.ajaxSetup({async:false});
        $.post("<?php echo site_url('auth/resources');?>",{access_token:access_token},
            function(data, status) {
                if(data) {
                    // resources = JSON.parse(data);
                    console.log(data);
                }
            } // Fecha function
        ); // fecha POST
    }

</script>