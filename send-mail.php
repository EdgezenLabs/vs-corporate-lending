<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "vendor/autoload.php";

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        $mail -> isSMTP();
        $mail -> Host = "smtp.gmail.com";
        $mail -> SMTPAuth = true;
        $mail -> Username = "mail.ramjay@gmail.com";
        $mail -> Password = "qggr shcg cjek mcag";
        $mail -> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail -> Port = 587;

        $mail -> setFrom("test@test.com", "Jay");
        $mail -> addAddress("mail.ramjay@gmail.com", "Jay");

        $mail -> Subject = "New Contact Form Submission";
        $mail -> Body = "Name: $name\n".
                        "Email: $email\n".
                        "Message: $message";
        if($mail -> send()){
            echo "Message sent successfully";
        }else{
            echo "Message could not be sent, Error: " . $mail->ErrorInfo; 
        }

    } catch (Exception $e) {
        echo "Message could not be sent, Error: " . $mail->ErrorInfo; 
    }
    
}
?>
