
<?php
require_once('PHPMailer/src/PHPmailer.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



$email = new PHPMailer();
$email->SetFrom('oufonnuch@gmail.com', 'Santa'); //Name is optional
$email->Subject = 'Message Subject';
$email->Body = "";
$email->AddAddress('s6302041520171@email.kmutnb.ac.th');

// $file_to_attach = 'PATH_OF_YOUR_FILE_HERE';

// $email->AddAttachment($file_to_attach, 'NameOfFile.pdf');

if (!$email->send()) {
    echo 'Message could not be sent. Mailer Error: ' . $email->ErrorInfo;
    echo '<div class="alert alert-danger" role="alert">
                พบข้อผิดพลาด ! กรุณาลองใหม่
            </div>';
} else {
    // send_email_id
    echo "success";
}
