<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";

// Retrieve form data
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();                                     
    $mail->Host = 'smtp.gmail.com';                       
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'nuniyat.g@gmail.com';                
    $mail->Password   = 'f d m x j p g w z d k j j a l k';                       
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   
    $mail->Port       = 587;                              

    // Recipients
    $mail->setFrom($email, $name);                        
    $mail->addAddress('nuniyat.g@gmail.com', 'Tewo');     

    // Content
    $mail->isHTML(false);                                 // Set email format to plain text
    $mail->Subject = 'New Message from ' . $name;         // Set a subject
    $mail->Body    = $message;                            // Set the body content

    // Send email
    $mail->send();
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

