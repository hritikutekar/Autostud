<?php

session_start();

?>

<!doctype html>
<html lang="">
<head>

    <title>AutoStud - Discussion</title>
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
<body class="quickSectionActive skipAutoCollapse">

<div class="bodyWrap">
    <header class="doc-header">
        <div class="logoWrap">
            <a href="../home"><img src="../assets/img/basic/logo.png" alt="/" width="109" height="43"></a>
        </div>
        <a href="#" class="nav-trigger"><i class="fa fa-navicon"></i></a>
        <ul class="main-nav">
            <li><a href="../home">Home</a></li>
            <li><a href="../about/">About</a></li>
            <li><a href="../post_question/">Post Question</a></li>
            <li class="active"><a href="./">Discussion</a></li>
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
            <div class="text-widget">
                <h4>What is this?</h4>
                <p>This is a discussion portal where you can ask questions of particular subject and the respective teacher will help you to solve your problem.</p>
            </div>
            <br>


        </div>
    </div>

    <main class="contentArea">
        <div class="contentAreaInner clearfix">
            <div class="heading">
                <?php
                include '../includes/dbh.inc.php';

                if (isset($_SESSION['enroll'])) {
                    $sql = "SELECT * FROM questions WHERE enroll=".$_SESSION['enroll'];
                } elseif (isset($_SESSION['id'])) {
                    $id = $_SESSION['id'];
                    $sql1 = "SELECT * FROM teacher_login WHERE teacher_id='$id'";
                    $result1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_fetch_assoc($result1);
                    if ($row1['AJP'] == '1') {
                        $sql = "SELECT * FROM questions WHERE `subject`='AJP'";
                    }
                    if ($row1['MAN'] == '1') {
                        $sql = "SELECT * FROM questions WHERE `subject`='MAN'";
                    }
                    if ($row1['STE'] == '1') {
                        $sql = "SELECT * FROM questions WHERE `subject`='STE'";
                    }
                    if ($row1['ESY'] == '1') {
                        $sql = "SELECT * FROM questions WHERE `subject`='ESY'";
                    }
                }
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck < 1) {
                    echo '<h1>No Topics Till Now!</h1><hr>';
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $sql1 = "SELECT * FROM user_login WHERE enroll=".$row['enroll'];
                        $result1 = mysqli_query($conn, $sql1);
                        $row1 = mysqli_fetch_assoc($result1);

                        echo '<h1><span class="version status solved">'.$row['subject'].'</span> <a href="discussion.php?id='.$row['id'].'&&subject='.$row['subject'].'">'.$row['question'].'</a></h1>by '.$row1['user_first'].' '.$row1['user_last'].' ('.$row1['enroll'].')'.'<hr>';

                    }
                }
                ?>

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
