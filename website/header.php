<!DOCTYPE html>
<html lang="ID">

<head>
    <?php
        $path = path();
        if ($path != false) {
            $query = $mysqli->query("SELECT * FROM join_temp WHERE code_room='$path' ");
            $data = $query->fetch_array();
            $id_quiz = $data['id_quiz'];
            $query2 = $mysqli->query("SELECT * FROM quiz WHERE id='$id_quiz' ");
            $data2 = $query2->fetch_array();
            echo' <title>'.title($data2['judul']).'</title>';
        } else {
            echo' <title>'.title().'</title>';
        }
        
    ?>
    <meta charset="UTF-8">
    <meta name="description" content="EndGam Gaming Magazine Template">
    <meta name="keywords" content="endGam,gGaming, magazine, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="img/icon.ico" rel="shortcut icon" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i" rel="stylesheet">


    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo url("css/bootstrap.min.css");?>" />
    <link rel="stylesheet" href="<?php echo url("css/font-awesome.min.css");?>" />
    <link rel="stylesheet" href="<?php echo url("css/slicknav.min.css");?>" />
    <link rel="stylesheet" href="<?php echo url("css/owl.carousel.min.css");?>" />
    <link rel="stylesheet" href="<?php echo url("css/magnific-popup.css");?>" />
    <link rel="stylesheet" href="<?php echo url("css/animate.css");?>" />

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="<?php echo url("css/style.css");?>" />
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<?php echo url("css/sweetalert2.min.css");?>" />

    <script src="<?php echo url("js/jquery-3.2.1.min.js");?>"></script>
    <script src="<?php echo url("js/sweetalert2.min.js");?>"></script>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.14.1/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
        https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.14.1/firebase-analytics.js"></script>


    <script src="https://www.gstatic.com/firebasejs/7.14.1/firebase-database.js"></script>



    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>