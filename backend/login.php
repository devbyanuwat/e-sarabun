<?php
session_start();
include('db.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM `user` WHERE `user_username` LIKE '$username' AND `user_password` LIKE '$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['user_username'];
    $_SESSION['password'] = $row['user_password'];
    $level = $row['level_id'];
    if ($level == 1) {
        $_SESSION['level'] = "Admin";
    } else if ($level == 2) {
        $_SESSION['level'] = "User";
    }
    echo $_SESSION['level'];
    header('location:../?q=search');
} else {
    header('location:../login.php');
}
