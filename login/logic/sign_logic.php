<?php

if (isset($_POST['submit'])) {

    include_once '../../includes/dbh.inc.php';

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $enroll = mysqli_real_escape_string($conn, $_POST['enroll']);
    $uid = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd1 = mysqli_real_escape_string($conn, $_POST['pwd1']);
    $pwd2 = mysqli_real_escape_string($conn, $_POST['pwd2']);

    //Error handler
    //Check for empty fields
    if (empty($first) || empty($last) || empty($email) || empty($enroll) || empty($uid) || empty($pwd1) || empty($pwd2)) {
        header("Location: ../?signup=empty");
        exit();
    } else {
        //Check if input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            header("Location: ../?signup=invalid");
            exit();
        } else {
            //Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ./?signup=email");
                exit();
            } else {
                $sql = "SELECT * FROM user_login WHERE enroll='$enroll'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    header("Location: ../?signup=already");
                    exit();
                } else {
                    //Confirm password
                    if (strcmp($pwd1, $pwd2) !== 0) {
                        header("Location: ../?signup=pass");
                        exit();
                    } else {
                        //Hashing the password
                        $hashedPwd = password_hash($pwd2, PASSWORD_DEFAULT);
                        //Insert the user into the database
                        $sql = "INSERT INTO user_login (user_first, user_last, user_email, enroll, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$enroll', '$uid', '$hashedPwd')";
                        mysqli_query($conn, $sql);
                        $sql = "INSERT INTO attendance_record (enroll) VALUE ('$enroll')";
                        mysqli_query($conn, $sql);
                        header("Location: ../?signup=success");
                    }
                }
            }
        }
    }
} else {
    header("Location: ../home");
    exit();
}