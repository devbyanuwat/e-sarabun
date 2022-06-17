<?php
include('../db.php');
$id = $_GET['doc_id'];
$sql = "DELETE FROM document WHERE `doc_id` = $id";

mysqli_query($conn, $sql);
mysqli_close($conn);
header("location:../../?q=send&page=1");
