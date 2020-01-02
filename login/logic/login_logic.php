<?php

session_start();

//Login for student
if (isset($_POST['student'])) {

    include '../../includes/dbh.inc.php';

    $uid = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    if (empty($uid) || empty($pwd)) {
        header("Location: ../?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM user_login WHERE user_uid='$uid' OR enroll='$uid'";

        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1) {
            header("Location: ../?login=error");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                //De-hashing the password
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                if ($hashedPwdCheck == false) {
                    header("Location: ../?login=error");
                    exit();
                } elseif ($hashedPwdCheck == true) {
                    //Log in the user here
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['enroll'] = $row['enroll'];
                    $_SESSION['u_uid'] = $row['user_uid'];

                    header("Location: ../student/");
                    exit();
                }
            }
        }
    }

}

//Login for teacher
if (isset($_POST['teacher'])) {

    include '../../includes/dbh.inc.php';

    $uid = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    if (empty($uid) || empty($pwd)) {
        header("Location: ../?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM teacher_login WHERE user_uid='$uid' OR teacher_id='$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1) {
            header("Location: ../?login=error");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                //De-hashing the password
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                if ($hashedPwdCheck == false) {
                    header("Location: ../?login=error");
                    exit();
                } elseif ($hashedPwdCheck == true) {
                    //Log in the user here
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uid'] = $row['user_uid'];
                    $_SESSION['id'] = $row['teacher_id'];

                    header("Location: ../teacher/");
                    exit();
                }
            }
        }
    }

}

//If button is not set
if (!isset($_POST['student']) || !isset($_POST['teacher'])) {
    header("Location: ./");
    exit();
}
