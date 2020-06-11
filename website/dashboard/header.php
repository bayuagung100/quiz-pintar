<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard <?php echo title();?></title>
    <link href="img/icon.ico" rel="shortcut icon" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo url("website/dashboard/");?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
        href="<?php echo url("website/dashboard/");?>plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo url("website/dashboard/");?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet"
        href="<?php echo url("website/dashboard/");?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet"
        href="<?php echo url("website/dashboard/");?>plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?php echo url("website/dashboard/");?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo url("website/dashboard/");?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet"
        href="<?php echo url("website/dashboard/");?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo url("website/dashboard/");?>plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo url("website/dashboard/");?>dist/css/adminlte.min.css">
    <!-- my custom css -->
    <link rel="stylesheet" href="<?php echo url("website/dashboard/");?>dist/css/my-custom.css">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<?php echo url("website/dashboard/");?>dist/css/sweetalert2.min.css">
    
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="<?php echo url("website/dashboard/");?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo url("website/dashboard/");?>plugins/daterangepicker/daterangepicker.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?php echo url("website/dashboard/");?>plugins/jquery/jquery.min.js"></script>
    <style>
    ul li .active {
        position: absolute;
        left: 5px;
        width: 5px;
        height: 22px;
        background: #C4C4C4;
    }

    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {
        opacity: 0.7;
    }

    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 9999;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content,
    #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
        .modal-content {
            width: 100%;
        }
    }
    </style>
    <script>
    $(document).ready(function() {
        //Memberi pesan pada tombol hapus
        $('.btn-danger').click(function() {
            if (confirm("Apakah Anda yakin?")) {
                return true;
            } else {
                return false;
            }
        });
        
    });
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
            <i class="fas fa-chevron-up"></i>
        </a>