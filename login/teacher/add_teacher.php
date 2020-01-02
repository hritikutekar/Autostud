<?php

if (isset($_POST['submit'])) {

    include '../../includes/dbh.inc.php';

    //Get all inputs
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd1 = mysqli_real_escape_string($conn, $_POST['pwd1']);
    $pwd2 = mysqli_real_escape_string($conn, $_POST['pwd2']);
    $ajp = mysqli_real_escape_string($conn, $_POST['ajp']);
    $man = mysqli_real_escape_string($conn, $_POST['man']);
    $ste = mysqli_real_escape_string($conn, $_POST['ste']);
    $esy = mysqli_real_escape_string($conn, $_POST['esy']);

    //Error handler
    //Check for empty fields
    if (empty($first) || empty($last) || empty($email) || empty($id) || empty($uid) || empty($pwd1) || empty($pwd2)) {
        header("Location: ./add_teacher.php?signup=empty");
        exit();
    } else {
        //Check if input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            header("Location: ./add_teacher.php?signup=invalid");
            exit();
        } else {
            //Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ./add_teacher.php?signup=email");
                exit();
            } else {
                $sql = "SELECT * FROM teacher_login WHERE id='$id'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0) {
                    header("Location: ./add_teacher.php?signup=already");
                    exit();
                } else {
                    //Confirm password
                    if (strcmp($pwd1, $pwd2) !== 0) {
                        header("Location: ./add_teacher.php?signup=pass");
                        exit();
                    } else {
                        //Hashing the password
                        $hashedPwd = password_hash($pwd2, PASSWORD_DEFAULT);
                        //Insert the user into the database
                        $sql = "INSERT INTO teacher_login (user_first, user_last, user_email, user_uid, teacher_id, user_pwd, AJP, MAN, STE, ESY) 
                                VALUES ('$first', '$last', '$email', '$uid', '$id', '$hashedPwd', '$ajp', '$man', '$ste', '$esy')";
                        mysqli_query($conn, $sql);
                        header("Location: ./add_teacher.php?signup=success");
                    }
                }
            }
        }
    }

}

?>

<html>
<head>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Add Teacher</title>
</head>
<body>
<style>

    .container {
        color: #666666;
        text-align: left;
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 15px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #c0c0c0;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark {
        background-color: #c0c0c0;
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked ~ .checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
        left: 9px;
        top: 5px;
        width: 6px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

</style>
<h1 class="aligncenter">Add Teacher</h1>
<form class="aligncenter" style="width: 50%;" method="POST" action="add_teacher.php">
    <input type="text" name="first" placeholder="First Name"><br>
    <input type="text" name="last" placeholder="Last Name"><br>
    <input type="text" name="email" placeholder="Email"><br>
    <input type="text" name="id" placeholder="ID"><br>
    <input type="text" name="uid" placeholder="Username"><br>
    <label class="aligncenter" style="text-align: left; font-size: 15px; color: #666666;">Subjects</label><br>
    <label class="container">Advanced Java Programing
        <input name="ajp" value="1" type="checkbox">
        <span class="checkmark"></span>
    </label>

    <label class="container">Management
        <input name="man" value="1" type="checkbox">
        <span class="checkmark"></span>
    </label>

    <label class="container">Software Testing
        <input name="ste" value="1" type="checkbox">
        <span class="checkmark"></span>
    </label>

    <label class="container">Embedded System
        <input name="esy" value="1" type="checkbox">
        <span class="checkmark"></span>
    </label><br>
    <input type="password" name="pwd1" placeholder="Password"><br>
    <input type="password" name="pwd2" placeholder="Confirm Password"><br>
    <input class="btn-block btn" type="submit" name="submit" value="Submit">
</form>
</body>
</html>
