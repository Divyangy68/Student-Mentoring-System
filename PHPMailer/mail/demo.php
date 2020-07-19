<?php
require_once 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

// SMTP configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';                      // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'romitgandhi77@gmail.com';                    // SMTP username
$mail->Password = 'romit@392000';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;


$mail->setFrom('romitgandhi77@gmail.com', 'Romit');
$mail->addReplyTo('romitgandhi77@gmail.com', 'Edu Interface');

// Add a recipient
$mail->addAddress("gandhiromit77@gmail.com");


// Email subject
$mail->Subject = 'Email Verification';

// Set email format to HTML
$mail->isHTML(true);

// Email body content
$mail->Body = "Demo";

// Send email
if(!$mail->send()){
  echo 'Message could not be sent.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
}
else{
  echo 'Message has been sent';

}

?>
