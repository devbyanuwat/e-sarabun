<?php
include('../db.php');

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$line_id = $_POST['line_id'];
$email = $_POST['email'];
$tel = $_POST['tel'];

$position = $_POST['position']; //get id
// $get_post = "SELECT * FROM `user_level` WHERE `level_rank` LIKE 'admin'";
$sql_get_post = "SELECT * FROM `position` WHERE `post_rank` LIKE '$position'";
$result_post = mysqli_query($conn, $sql_get_post);
$row_post = mysqli_fetch_assoc($result_post);
$post_id = $row_post['post_id'];
// echo $post_id;

$dept = $_POST['dept']; //get id
// $get_post = "SELECT * FROM `user_level` WHERE `level_rank` LIKE 'admin'";
$sql_get_dept = "SELECT * FROM `department` WHERE `dept_department` LIKE '$dept'";
$result_dept = mysqli_query($conn, $sql_get_dept);
$row_dept = mysqli_fetch_assoc($result_dept);
$dept_id = $row_dept['dept_id'];

// echo $dept_id;

$level = $_POST['level']; //get id
$sql_get_level = "SELECT * FROM `user_level` WHERE `level_rank` LIKE '$level'";
$result_level = mysqli_query($conn, $sql_get_level);
$row_level = mysqli_fetch_assoc($result_level);
$level_id = $row_level['level_id'];

$sql = "INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_name`, `user_lineid`, `user_email`, `user_tel`, `post_id`, `dept_id`, `level_id`) 
VALUES (NULL, '$username', '$password', '$name', '$line_id', '$email', '$tel', '$post_id', '$dept_id', '$level_id');";
mysqli_query($conn, $sql);
mysqli_close($conn);
header("location:../../?q=manage");
