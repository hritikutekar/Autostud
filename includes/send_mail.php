<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'phpmailer/vendor/autoload.php';

function sendMail($email, $enroll, $name, $question){

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com;smtp1.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = 'thisisautostud@gmail.com';                     // SMTP username
        $mail->Password = '@utoStud1234';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('thisisautostud@gmail.com');
        $mail->addAddress($email);     // Add a recipient

        //Body of the mail in html
        $body = '<p><strong><h2>There is a new question by '.$name.' ('.$enroll.')</h2><br></strong><h4>The Question is as follows:</h4><br><h4><b>'.$question.'</b></h4></p><br>';

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'There is a new question waiting for you!';
        $mail->Body = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        header("Location: ../../discussion/");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
