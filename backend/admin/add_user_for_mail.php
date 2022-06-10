<?php
include('../../top.php');
include('../db.php');
$to = $_POST['to'];
$doc_id =  $_POST['doc_id'];
$to = explode(",", $to);

echo $doc_id;
echo "<br>";
echo $to[0];
echo "<br>";
echo $to[1];


$select = "SELECT * FROM `user` WHERE `user_username` LIKE '$to[0]'";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);
$to =  $row['user_id'];

echo "<br>";
echo $to;

$sql = "INSERT INTO `send_mail` (`send_mail_id`, `user_id`, `doc_id`) VALUES (NULL, '$to', '$doc_id')";
mysqli_query($conn, $sql);

mysqli_close($conn);

header("location:../../?q=send_mail&doc_id=$doc_id");
// header("Refresh: 10; URL=");
