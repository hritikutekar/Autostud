<?php

session_start();

if (!isset($_SESSION['u_uid'])) {
    header("Location: ./");
    exit();
}

include '../../includes/dbh.inc.php';

//Fetching subjects
$id = $_SESSION['id'];
$sql = "SELECT * FROM teacher_login WHERE teacher_id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$sql1 = "SELECT * FROM user_login";
$result1 = $conn->query($sql1);

?>

<!doctype html>
<html lang="">
<head>

    <title>AutoStud - STE</title>
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
            <a href="./"><button class="btn-block btn">Close</button></a>
            <p style="color: #000000;font-size: 20px;" class="aligncenter"><b>Your Subjects</b></p>
            <?php

            if ($row['AJP'] == '1') {
                echo '<a class="triggerSwap" href="ajp.php"><button class="btn-block btn">AJP</button></a><br>';
            }
            if ($row['MAN'] == '1') {
                echo '<a class="triggerSwap" href="#MAN"><button class="btn-block btn">MAN</button></a><br>';
            }
            if ($row['STE'] == '1') {
                echo '<a class="triggerSwap" href="#STE"><button class="btn-block btn">STE</button></a><br>';
            }
            if ($row['ESY'] == '1') {
                echo '<a class="triggerSwap" href="#ESY"><button class="btn-block btn">ESY</button></a><br>';
            }

            ?>
        </div>
    </div>
    <main class="contentArea">
        <div class="contentAreaInner clearfix no-pad-left no-pad-right">
            <header class="page-header text-center extra-top-pad pad-long">
                <strong><span class="sub">STE</span> <?php echo date("d/m/Y"); ?></strong><br><br>
                <div class="aligncenter">
                    <?php
                    echo '<button id="submit" class="btn btn-success">Send</button><br><br>';
                    ?>
                    <ul>
                <?php

                while ($row1 = $result1->fetch_assoc()) {
                    $sql2 = "SELECT * FROM attendance_record WHERE enroll='".$row1['enroll']."'";
                    $result2 = $conn->query($sql2);
                    $row2 = $result2->fetch_assoc();
                    echo '<div class="student-record aligncenter">
                              <span class="roll"><a href=""><li>'.$row1['enroll'].'</li></a></span>: 
                              <span class="present"><li>'.$row2['STE'].'</li></span>
                              <button style="background-color: #ff4444;" class="marker btn attend">A</button>
                            </div><br>';

                }
                ?>
                    </ul>
                </div>
            </header>
        </div>
    </main>

</div>

<!--========================================
Javascript
===========================================-->

<script src="../../assets/lib/jquery/dist/jquery.min.js"></script>
<script src="../../assets/js/app.js"></script>
<script src="../../assets/js/take_ste.js"></script>

</body>
</html>
