<?php
include('../db.php');
$doc_id = $_GET['doc_id'];
$send_mail_id = $_GET['send_mail_id'];
$sql = "DELETE FROM send_mail WHERE `send_mail`.`send_mail_id` = $send_mail_id";
mysqli_query($conn, $sql);
mysqli_close($conn);
header("location:../../?q=send_mail&doc_id=$doc_id");
