<?php

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Required files
require 'C:\xampp\htdocs\phpmailer\vendor\phpmailer\phpmailer\src\Exception.php';
require 'C:\xampp\htdocs\phpmailer\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\phpmailer\vendor\phpmailer\phpmailer\src\SMTP.php';

// Create an instance; passing `true` enables exceptions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $mail = new PHPMailer(true);

  try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your_email_address'; //sender emai
    $mail->Password   = 'app password';  //SMTP password
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    // Recipients
    $mail->setFrom('your_email_address', $_POST["name"]);   //sender emai
    $mail->addAddress($_POST["recipient"]);

    // Content
    $mail->isHTML(true);
    $mail->Subject = $_POST["subject"];
    $mail->Body    = $_POST["message"];

    // Send email
    $mail->send();
    echo "<script> 
            alert('Message was sent successfully!');
            window.location.href = 'index.php';
          </script>";
  } catch (Exception $e) {
    echo "<script>
            alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
            window.location.href = 'index.php';
          </script>";
  }
}
?>
