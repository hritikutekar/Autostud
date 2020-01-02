<?php

session_start();

?>
<!doctype html>
<html lang="">
<head>

    <title>AutoStud - Post Question</title>
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
                <li><a href="../about/">About</a></li>
                <li class="active"><a href="./">Post Question</a></li>
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
            <div class="contentAreaInner small-canvas clearfix">
                <header class="page-header user-widget-wrap">
                    <h1>Post A New Question</h1>
                    <div class="user-widget top-right">
                        <figure><img src="../assets/img/avatar.png" alt=""></figure>
                        <cite><?php
                            if (!isset($_SESSION['u_uid'])) {
                                echo '<a href="../login">Login</a>';
                            } else {
                                echo $_SESSION['u_first']; echo ' '; echo $_SESSION['u_last'];
                            }
                            ?></cite>
                        <a href="../login"><span>Profile</span></a>

                    </div>
                </header>

                <form method="POST" action="logic/post_new_question.php">
                    <div class="custom-select">
                        <span>Select a Subject</span>
                        <select name="subject">
                            <option value="0" selected>Select a Subject</option>
                            <option value="AJP">Advanced Java</option>
                            <option value="STE">Software testing</option>
                            <option value="MAN">Management</option>
                            <option value="ESY">Embedded System</option>
                        </select>
                    </div>
                    <div class="input-block">
                        <input placeholder="Your Question" name="question" id="giveTitle" type="text">
                    </div>
                    <div class="input-block">
                        <textarea placeholder="Write to describe..." name="description" id="writeDetails"></textarea>
                    </div>
                    <div class="custom-checkbox">
                        <input value="1" name="notify" type="checkbox" id="followup-check">
                        <label for="followup-check">
                            <span></span>
                            Notify me of follow-up replies
                        </label>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-lg"><i class="fa fa-hashtag"></i>POST QUESTION</button>
                    </div>
                </form>

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
