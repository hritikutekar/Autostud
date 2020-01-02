<?php

session_start();

if (isset($_SESSION['enroll'])) {
    header("Location: student/");
    exit();
}
if (isset($_SESSION['id'])) {
    header("Location: teacher/");
    exit();
}

?>

<!doctype html>
<html lang="">
<head>

    <title>AutoStud - Login | SignUp</title>
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
<!--options panel/ panel in the middle , wont collapse on this page automatically-->
<body class="quickSectionActive skipAutoCollapse">

    <div class="bodyWrap">
        <header class="doc-header">
            <div class="logoWrap">
                <a href="../home/index.php"><img src="../assets/img/basic/logo.png" alt="/" width="109" height="43"></a>
            </div>
            <a href="#" class="nav-trigger"><i class="fa fa-navicon"></i></a>
             <ul class="main-nav">
                <li><a href="../home/">Home</a></li>
                <li><a href="../about/">About</a></li>
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
                <form action="logic/login_logic.php" method="POST" id="loginForm" class="swap-able active">
                    <h4>Login to your student account</h4>
                    <div class="input-block fancy-block">
                        <span class="fa fa-user"></span>
                        <input placeholder="Username or Enrollment" name="username" id="usr_username" type="text">
                    </div>
                    <div class="input-block fancy-block">
                        <span class="fa fa-lock"></span>
                        <input placeholder="Password" name="pwd" id="usr_pswrd" type="password">
                    </div>
                    <input type="submit" value="Login" name="student" class="btn-block btn"><br>
                    <a class="triggerSwap" href="#teacherLoginForm">Login As Teacher</a><br>
                    <a class="triggerSwap" href="#signupForm">Don't Have Account? Sign up</a>
                </form>

                <form action="logic/login_logic.php" method="POST" id="teacherLoginForm" class="swap-able">
                    <h4>Login to your teacher account</h4>
                    <div class="input-block fancy-block">
                        <span class="fa fa-user"></span>
                        <input placeholder="Username or ID" name="username" id="usr_username" type="text">
                    </div>
                    <div class="input-block fancy-block">
                        <span class="fa fa-lock"></span>
                        <input placeholder="Password" name="pwd" id="usr_pswrd" type="password">
                    </div>
                    <input type="submit" value="Login" name="teacher" class="btn-block btn"><br>
                    <a class="triggerSwap" href="#loginForm">Login As Student</a><br>
                </form>

                <form method="POST" action="logic/sign_logic.php" id="signupForm" class="swap-able">
                    <h4>Create a new account</h4>
                    <div class="input-block fancy-block">
                        <span class="fa fa-user"></span>
                        <input placeholder="First Name" id="usr_username2" name="first" type="text">
                    </div>
                    <div class="input-block fancy-block">
                        <span class="fa fa-user"></span>
                        <input placeholder="Last Name" id="usr_username3" name="last" type="text">
                    </div>
                    <div class="input-block fancy-block">
                        <span class="fa fa-envelope"></span>
                        <input placeholder="Email" id="usr_eml" name="email" type="email">
                    </div>
                    <div class="input-block fancy-block">
                        <span class="fa fa-user"></span>
                        <input placeholder="Enrollment" id="usr_username5" name="enroll" type="text">
                    </div>
                    <div class="input-block fancy-block">
                        <span class="fa fa-user"></span>
                        <input placeholder="Username" id="usr_username4" name="username" type="text">
                    </div>
                    <div class="input-block fancy-block">
                        <span class="fa fa-lock"></span>
                        <input placeholder="Password" id="usr_pswrd2" name="pwd1" type="password">
                    </div>
                    <div class="input-block fancy-block">
                        <span class="fa fa-star"></span>
                        <input placeholder="Confirm Password" id="usr_pswrd3" name="pwd2" type="password">
                    </div>
                    <button type="submit" name="submit" class="btn-block btn">Signup</button><br>
                    <a class="triggerSwap" href="#loginForm">Already have an account? Login</a>
                </form>

            </div>
        </div>
        <main class="contentArea">
            <div class="contentAreaInner clearfix no-pad-left no-pad-right">
                <header class="page-header text-center extra-top-pad pad-long">
                    <img src="../assets/img/logo-2.png" alt="dumy"><br><br>
                    <strong>CREATING DOCUMENTION WAS NEVER BEEN EASY</strong>
                </header>

               <div class="steps clearfix">
                   <div class="step">
                       <i class="fa fa-user"></i>
                       Create an account
                   </div>
                   <div class="step">
                       <i class="fa fa-support"></i>
                       Post an Question
                   </div>
                   <div class="step">
                       <i class="fa fa-comments"></i>
                       Get help
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
