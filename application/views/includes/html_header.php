<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DaviLab</title>

    <!-- Bootstrap, Animate, FontAwesome, JQuery e SweetAlert -->
    <link href="<?php echo base_url();?>assets/bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css"  rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet"/>
    
    <script src="<?php echo base_url();?>assets/bootstrap-5.3.0-alpha3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/jquery-3.6.4.min.js"></script>
    <script src="<?php echo base_url();?>assets/fonts/font-awesome/js/all.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets\css\configuracoes.css">


    <?php $this->load->helper('language');?>

    <!-- Soft UI Template -->
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

        <!-- Icons -->
        <link href="<?php echo base_url();?>assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assets/css/nucleo-svg.css" rel="stylesheet" />

        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

        <!-- =============== Comentado pois estava dando incompatibilidade com o tema do DaviLab =============== -->
        <!-- CSS Files -->
        <!-- <link id="pagestyle" href="<?php echo base_url();?>assets/css/soft-ui-dashboard.css" rel="stylesheet" /> -->

        <!-- Core -->
        <script src="<?php echo base_url();?>assets/js/core/popper.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/core/bootstrap.min.js"></script>

        <!-- =============== Comentado pois estava dando incompatibilidade com o tema do DaviLab =============== -->
        <!-- Theme JS -->
        <!-- <script src="<?php echo base_url();?>assets/js/soft-ui-dashboard.min.js"></script> -->

        <!-- DataTables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <!-- ************************ -->
</head>