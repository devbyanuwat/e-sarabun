<?php
include('../db.php');
$id = $_GET['user_id'];
$sql = "DELETE FROM user WHERE `user_id` = $id";

mysqli_query($conn, $sql);
mysqli_close($conn);
header("location:../../?q=manage&page=1");
