<?php


include('../db.php');

$category = $_POST['category'];

$sql_category = "SELECT * FROM `doc_type` WHERE `doc_type` LIKE '$category'";
$result_category = mysqli_query($conn, $sql_category);
$row_category = mysqli_fetch_assoc($result_category);
$category_id = $row_category['doc_type_id'];

$doc_id = $_POST['doc_id'];

$user_name = $_POST['id'];
$sql_user = "SELECT * FROM `user` WHERE `user_name` LIKE '$user_name'";
$result_user = mysqli_query($conn, $sql_user);
$row_user = mysqli_fetch_assoc($result_user);
$user_id = $row_user['user_id'];


$no = $_POST['no'];
$date = $_POST['date'];
$time = $_POST['time'];
$from = $_POST['from'];
$topic = $_POST['topic'];
$refer_to = $_POST['refer_to'];
$att = $_POST['att'];
$action = $_POST['action'];
$handle = $_POST['handle'];
$urgency = $_POST['urgency'];

$sql = "UPDATE `document` SET 
`doc_type_id` = '$category_id', 
`user_id` = '$user_id', 
`doc_book_number` = '$no', 
`doc_date` = '$date', 
`doc_time` = '$time', 
`doc_from` = '$from', 
`doc_topic` = '$topic', 
`doc_refer_to` = '$refer_to', 
`doc_attach` = '$att', 
`doc_handle` = '$handle', 
`doc_action` = '$action', 
`doc_urgency` = '$urgency', 
`doc_status` = '1' 
WHERE 
`document`.`doc_id` = $doc_id;";
mysqli_query($conn, $sql);
mysqli_close($conn);
header("location:../../?q=search");
