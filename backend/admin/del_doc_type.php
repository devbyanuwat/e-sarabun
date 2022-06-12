<?php
include('../db.php');
$doc_type_id = $_GET['doc_type_id'];

$sql = "DELETE FROM doc_type WHERE `doc_type`.`doc_type_id` = $doc_type_id";
mysqli_query($conn, $sql);

mysqli_close($conn);

header('location:../../?q=doc&page=1');
