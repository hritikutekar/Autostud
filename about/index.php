<?php

session_start();

?>

<!doctype html>
<html lang="">
<head>

    <title>AutoStud - About</title>
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
    <link rel="icon" sizes="192x192" href="../assets/img/basic/chrome-touch-icon-192x192.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Web Starter Kit">
    <link rel="apple-touch-icon" href="../assets/img/basic/apple-touch-icon.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="assets/img/basic/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#55acee">
    <!-- Color the status bar on mobile devices -->
    <meta name="theme-color" content="#55acee">

    <!--========================================
    CSS
    ===========================================-->
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
    <!--put your custom css on the file below-->
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css">


</head>
<body class="quickSectionActive">

    <div class="bodyWrap">
        <header class="doc-header">
            <div class="logoWrap">
                <a href="../home"><img src="../assets/img/basic/logo.png" alt="/" width="109" height="43"></a>
            </div>
            <a href="#" class="nav-trigger"><i class="fa fa-navicon"></i></a>
             <ul class="main-nav">
                <li><a href="../home">Home</a></li>
                <li class="active"><a href="./">About</a></li>
                <li><a href="../post_question/">Post Question</a></li>
                <li><a href="../discussion/">Discussion</a></li>
                 <li><a href="../login"><?php
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
                <div class="search-widget">
                    <form>
                        <div class="input-block">
                            <label for="searchDocs">SEARCH ANYTHING</label>
                            <input id="searchDocs" type="text">
                        </div>
                        <button type="submit"><i class="fa fa-search"></i> </button>
                    </form>
                </div>
            </div>
        </div>
        <main class="contentArea">
            <div class="contentAreaInner clearfix">
                <div class="row">
                    <div class="col-xs-12 col-lg-6 pull-right">
                        <div class="text-widget">
                            <div class="heading heading-lg">
                                <h2>We Built This <br>with <span>PHP</span></h2>
                                <p>A full-service digital attendance approach<br>
                                    <span>to reduce paper work</span></p>
                            </div>
                            <div class="text-content">
                                <br>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-6 pull-right">
                        <div class="hidden-lg"><hr></div>
                        <div class="service">
                            <h3>Strategy &amp; Consulting</h3>
                            <div class="inner">
                                <i class="fa fa-bar-chart"></i>
                                <p>We built this web app with PHP. We analyze every aspect of colleges and apply our digital AutoStud to provide efficiency for success.</p>
                            </div>
                        </div><!--service-->
                        <div class="service">
                            <h3>Creative Design</h3>
                            <div class="inner">
                                <i class="fa fa-magic"></i>
                                <p>We build AutoStud with razor-sharp strategy.</p>
                            </div>
                        </div><!--service-->
                        <div class="service">
                            <h3>Web &amp; Mobile Development</h3>
                            <div class="inner">
                                <i class="fa fa-desktop"></i>
                                <p>This can also be run on a mobile or any device with browser support.</p>
                            </div>
                        </div><!--service-->
                        <div class="service">
                            <h3>Online Attendance</h3>
                            <div class="inner">
                                <i class="fa fa-area-chart"></i>
                                <p>AutoStud supports online attendance of students.</p>
                            </div>
                        </div><!--service-->
                    </div>
                </div>
            </div><!--contenAreaInner-->
        </main>

    </div>

    <!--========================================
    Javascript
    ===========================================-->

    <script src="../assets/lib/jquery/dist/jquery.min.js"></script>
    <script src="../assets/js/app.js"></script>

</body>
</html>
