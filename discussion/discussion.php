<?php

session_start();

if(!isset($_SESSION['u_uid'])) {
    header("Location: ../login/");
    exit();
}
//Getting question ID
if (isset($_GET['id'])) {
    include '../includes/dbh.inc.php';
    $_SESSION['question_id'] = $_GET['id'];
    $_SESSION['question_subject'] = $_GET['subject'];
    $id = $_GET['id'];
    $sql = "SELECT * FROM questions WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $enroll = $row['enroll'];
    $sql1 = "SELECT * FROM user_login WHERE enroll='$enroll'";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
}

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
                echo '<h1><span class="version status solved">'.$row['subject'].'</span> '.$row['question'].'</h1>';
                ?>
                <hr>
            </div>
            <div class="discussion-area">
                <div class="topic-comments">
                    <div class="comment user-comment">
                        <div class="comment-content">
                            <p>
                            <?php echo $row['description']; ?><br>&nbsp;
                            </p>
                        </div>
                        <cite class="commentator">
                            <span class="auth-dp"><img src="../assets/img/avatar.png" alt="asd"></span>
                            <?php echo $row1['user_first'].' '.$row1['user_last'].'<br>'; ?>
                            <span>Student</span>
                        </cite>
                    </div>
                    <?php
                    $sql_discussion = "SELECT * FROM discussion WHERE question_id='$id'";
                    $result_discussion = mysqli_query($conn, $sql_discussion);

                    while ($row_discussion = mysqli_fetch_assoc($result_discussion)){

                        if ($row_discussion['teacher_id'] != NULL){
                            echo '<div class="comment staff-comment">
                                <div class="comment-content">
                                    <p>'.$row_discussion['message'].'</p><br>&nbsp;
                                </div>
                                <cite class="commentator">
                                    <span class="auth-dp"><img src="../assets/img/avatar.png" alt="asd"></span>
                                    '.$row_discussion['user_first'].' '.$row_discussion['user_last'].'
                                    <span>Teacher</span>
                                </cite>
                            </div>';
                        } elseif ($row_discussion['enroll'] != NULL) {
                            echo '<div class="comment user-comment">
                                <div class="comment-content">
                                    <p>'.$row_discussion['message'].'</p><br>&nbsp;
                                </div>
                                <cite class="commentator">
                                    <span class="auth-dp"><img src="../assets/img/avatar.png" alt="asd"></span>
                                    '.$row_discussion['user_first'].' '.$row_discussion['user_last'].'
                                    <span>Student</span>
                                </cite>
                            </div>';
                        }
                    }
                    ?>

                </div>
                <hr>
                <h4>Replay to : <?php echo $row['question']; ?></h4>
                <form method="POST" action="logic/post_message.php">
                    <div class="input-block">
                        <textarea name="message" placeholder="Write to reply..." class="text-area-sm" id="writeDetails"></textarea>
                    </div>
                    <br>
                    <br>
                    <br>
                    <button type="submit" name="postMessage" class="btn"><i class="fa fa-hashtag"></i>POST Reply</button>

                </form>
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
