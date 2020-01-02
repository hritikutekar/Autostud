<?php

session_start();

if (!isset($_SESSION['u_uid'])) {
    header("Location: ./");
    exit();
}

include '../../includes/dbh.inc.php';

//Fetching attendance
$enroll = $_SESSION['enroll'];
$sql = "SELECT * FROM attendance_record WHERE enroll='$enroll'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

//Fetching total classes
$sql1 = "SELECT * FROM total_classes WHERE id='1'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);

?>

<!doctype html>
<html lang="">
<head>

    <title>AutoStud - Attendance</title>
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
            <h1 style="font-size: 40px;" class="aligncenter"><b>Welcome!</b></h1><h1 class="aligncenter"><b><?php echo $_SESSION['u_first']; ?> <?php echo $_SESSION['u_last']; ?></b></h1>
            <p style="color: #000000; " class="aligncenter"><b>(<?php echo $_SESSION['enroll']; ?>)</b></p><br>
            <a href=".."><button class="btn-block btn">Close</button></a><br>
            <a href="../../post_question"><button class="btn-block btn">Post Question</button></a><br>
            <a href="../logic/logout_logic.php"><button class="btn-block btn">Logout</button></a>
        </div>
    </div>
    <main class="contentArea">
        <div class="contentAreaInner clearfix no-pad-left no-pad-right">
            <header class="page-header text-center extra-top-pad pad-long">
                <br><br><br><br><br>
                <table style="width:60%;margin: auto;color: #696969;">
                    <tr>
                        <th>Subject</th>
                        <th>Present</th>
                        <th>Absent</th>
                        <th>Total</th>
                    </tr>
                    <tr>
                        <td>Advanced Java Programing</td>
                        <td><?php echo $row['AJP'] ?></td>
                        <td><?php echo $row1['AJP']-$row['AJP']?></td>
                        <td><?php echo $row1['AJP'] ?></td>
                    </tr>
                    <tr>
                        <td>Software Testing</td>
                        <td><?php echo $row['STE'] ?></td>
                        <td><?php echo $row1['STE']-$row['STE']?></td>
                        <td><?php echo $row1['STE'] ?></td>
                    </tr>
                    <tr>
                        <td>Embedded System</td>
                        <td><?php echo $row['ESY'] ?></td>
                        <td><?php echo $row1['ESY']-$row['ESY']?></td>
                        <td><?php echo $row1['ESY'] ?></td>
                    </tr>
                    <tr>
                        <td>Management</td>
                        <td><?php echo $row['MAN'] ?></td>
                        <td><?php echo $row1['MAN']-$row['MAN']?></td>
                        <td><?php echo $row1['MAN'] ?></td>
                    </tr>
                </table>
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
