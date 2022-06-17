<?php
include('db.php');
// session_start();
// $doc_id = $_GET['doc_id'];
// $user_id = $_SESSION['user_id'];

$send_mail_id = $_GET['send_mail_id'];


// $select = "SELECT * FROM `send_mail` WHERE `user_id` = $user_id AND `doc_id` = $doc_id";
// $get_id = mysqli_fetch_assoc(mysqli_query($conn, $select));

// $send_mail_id = $get_id['send_mail_id'];
// echo $send_mail_id;


$sql = "UPDATE `send_mail` SET `doc_status_id` = '2' WHERE `send_mail`.`send_mail_id` = $send_mail_id";
mysqli_query($conn, $sql);
mysqli_close($conn);
echo "<script>success('บันทึกสำเร็จ','?q=search&page=1')</script>";
// echo "test";
