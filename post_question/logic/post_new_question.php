<?php

session_start();

//Check if session is ON
if (!isset($_SESSION['u_uid'])) {
    header("Location: ../../login/");
    exit();
} else {
    //If submit button is clicked
    if (isset($_POST['submit'])) {

        include '../../includes/dbh.inc.php';
        include '../../includes/send_mail.php';

        $subject = mysqli_real_escape_string($conn, $_POST['subject']);
        $question = mysqli_real_escape_string($conn, $_POST['question']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $notify = mysqli_real_escape_string($conn, $_POST['notify']);
        //If no subject is selected
        if ($subject == "0") {
            header("Location: ../?question=noSubject");
            exit();
        } else {
            //Check if anything is empty
            if (empty($subject) || empty($question) || empty($description)) {
                header("Location: ../?question=empty");
                exit();
            } else {
                //Check if question is already there
                $sql = "SELECT * FROM questions WHERE question='$question'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    header("Location: ../?question=already");
                    exit();
                } else {
                    //Insert question into database
                    $enroll = (string)$_SESSION['enroll'];
                    $sql = "INSERT INTO `questions`(`enroll`, `subject`, `question`, `description`, `notify`) VALUES ('$enroll', '$subject', '$question', '$description', '$notify')";
                    mysqli_query($conn, $sql);

                    //Mail respective subject teacher
                    $sql = "SELECT * FROM teacher_login WHERE ".$subject."='1'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $email = (string)$row['user_email'];
                    $name = (string)$_SESSION['u_first'];
                    sendMail($email, $enroll, $name, $question);

                    //Redirect user to discussion
                    //header("Location: ../../discussion/");
                    //exit();
                }
            }
        }

    } else {
        header("Location: ../");
        exit();
    }
}