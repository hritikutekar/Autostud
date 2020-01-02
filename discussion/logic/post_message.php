<?php

session_start();

if (isset($_POST['postMessage'])) {

    include '../../includes/dbh.inc.php';
    $question_id = $_SESSION['question_id'];
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $first = $_SESSION['u_first'];
    $last = $_SESSION['u_last'];
    $question_subject = $_SESSION['question_subject'];

    if (isset($_SESSION['enroll'])) {
        //Student
        $enroll = $_SESSION['enroll'];

        $sql = "INSERT INTO `discussion`(`question_id`, `enroll`, `user_type`, `user_first`, `user_last`, `message`, `subject`) VALUES ('$question_id', '$enroll', 'student', '$first', '$last', '$message', '$question_subject')";
        mysqli_query($conn, $sql);
        header("Location: ../discussion.php?id=".$question_id."&&subject=".$question_subject);
        exit();

    } elseif (isset($_SESSION['id'])) {
        //Teacher
        $id = $_SESSION['id'];

        $sql = "INSERT INTO `discussion`(`question_id`, `teacher_id`, `user_type`, `user_first`, `user_last`, `message`, `subject`) VALUES ('$question_id', '$id', 'teacher', '$first', '$last', '$message', '$question_subject')";
        mysqli_query($conn, $sql);
        header("Location: ../discussion.php?id=".$question_id."&&subject=".$question_subject);
        exit();

    }
} else {
    header("Location: ../questions.php");
    exit();
}
