<?php

session_start();

if (!isset($_SESSION['u_uid'])) {
    header("Location: ./");
    exit();
}

?>

<!doctype html>
<html lang="">
<head>

    <title>AutoStud - Teacher</title>
    <!--========================================
    Meta
    ===========================================-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <!-- Web Application Manifest -->

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="xDocs">
    <link rel="icon" sizes="192x192" href="../../assets/img/basic/chrome-touch-icon-192x192.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Web Starter Kit">
    <link rel="apple-touch-icon" href="../../assets/img/basic/apple-touch-icon.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="assets/img/basic/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#55acee">
    <!-- Color the status bar on mobile devices -->
    <meta name="theme-color" content="#55acee">

    <!--========================================
    CSS
    ===========================================-->
    <link href="../../assets/css/style.css" rel="stylesheet" type="text/css">
    <!--put your custom css on the file below-->
    <link href="../../assets/css/custom.css" rel="stylesheet" type="text/css">


</head>
<!--options panel/ panel in the middle , wont collapse on this page automatically-->
<body class="quickSectionActive skipAutoCollapse">

<div class="bodyWrap">
    <header class="doc-header">
        <div class="logoWrap">
            <a href="../../home/index.php"><img src="../../assets/img/basic/logo.png" alt="/" width="109" height="43"></a>
        </div>
        <a href="#" class="nav-trigger"><i class="fa fa-navicon"></i></a>
        <ul class="main-nav">
            <li><a href="../../home">Home</a></li>
            <li><a href="../../about">About</a></li>
            <li><a href="../../post_question">Post Question</a></li>
            <li><a href="../../discussion">Discussion</a></li>
            <li><a href=".."><?php
                    if (!isset($_SESSION['u_uid'])) {
                        echo 'Sign in / Sign up';
                    } else {
                        echo 'Profile';
                    }
                    ?></a></li>
        </ul>

        <span class="copyRights">&copy; 2019, All rights reserved</span>
    </header>
    <button class="toggleOptionPanel"><i class="fa fa-align-right"></i></button>
    <div class="optionsPanel">
        <button class="toggleOptionPanel"><i class="fa fa-align-right"></i></button>
        <div class="inner">
            <h1 style="text-align: center;"><b>Profile</b></h1>
            <img src="../../assets/img/avatar.png" class="avatar aligncenter" alt="avatar">
            <h1 style="font-size: 40px;" class="aligncenter"><b>Welcome!</b></h1><h1 class="aligncenter">
                <!-- Display name of user -->
                <b><?php echo $_SESSION['u_first']; ?> <?php echo $_SESSION['u_last']; ?></b>
            </h1>
            <!-- Display enrollment number -->
            <p style="color: #000000; " class="aligncenter"><b>(<?php echo $_SESSION['id']; ?>)</b></p><br>
            <!-- Functions a student can do -->
            <a href="take_attendance.php"><button class="btn-block btn">Take Attendance</button></a><br>
            <a href="../../discussion/my_question.php"><button class="btn-block btn">View Questions</button></a><br>
            <a href="../logic/logout_logic.php"><button class="btn-block btn">Logout</button></a>
        </div>
    </div>
    <main class="contentArea">
        <div class="contentAreaInner clearfix no-pad-left no-pad-right">
            <header class="page-header text-center extra-top-pad pad-long">
                <br><br><br><br><br><br><img src="../../assets/img/logo-2.png" alt="dumy"><br><br>
                <strong>CREATING DOCUMENTION WAS NEVER BEEN EASY</strong>
            </header>
        </div>
    </main>

</div>

<!--========================================
Javascript
===========================================-->

<script src="../../assets/lib/jquery/dist/jquery.min.js"></script>
<script src="../../assets/js/app.js"></script>

</body>
</html>
