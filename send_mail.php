<?php

// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer;

$mail->isSMTP();                      // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;               // Enable SMTP authentication 
$mail->Username = 's6302041520171@email.kmutnb.ac.th';   // SMTP username 
$mail->Password = 'Tansanguan1@';   // SMTP password 
$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 25;                    // TCP port to connect to 

// Sender info 
$mail->setFrom('sender@codexworld.com', 'KMUTNB');
$mail->addReplyTo('reply@codexworld.com', 'KMUTNB');

// Add a recipient 
$mail->addAddress('oufonnuch@gmail.com');
$mail->addAddress('pocketninja768@gmail.com');
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
$mail->addAttachment('/var/tmp/file.tar.gz');
$mail->addAttachment('doc/Final_CAD.pdf');

// Set email format to HTML 
$mail->isHTML(true);

// Mail subject 
$mail->Subject = 'DOC';

// Mail body content 
$bodyContent = '<h1>How to Send Email from Localhost using PHP by CodexWorld</h1>';
$bodyContent .= '<p>This HTML email is sent from the localhost server using PHP by <b>CodexWorld</b></p>';
$mail->Body    = $bodyContent;

// Send email 
if (!$mail->send()) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent.';
}
