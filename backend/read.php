<?php
include('db.php');
$doc_id = $_GET['doc_id'];
$sql = "UPDATE `document` SET `doc_status` = '2' WHERE `document`.`doc_id` = $doc_id";
mysqli_query($conn, $sql);
mysqli_close($conn);
echo "<script>window.location.href='?q=search'</script>";
echo "test";
