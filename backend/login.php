<?php
session_start();
include('db.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM `user` WHERE `user_username` LIKE '$username' AND `user_password` LIKE '$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['username'] = $row['user_username'];
    $_SESSION['password'] = $row['user_password'];
    $_SESSION['name'] = $row['user_name'];
    $level = $row['level_id'];
    if ($level == 1) {
        $_SESSION['level'] = "Admin";
    } else if ($level == 2) {
        $_SESSION['level'] = "User";
    }
    echo $_SESSION['user_id'];

    // if ($_SESSION['level'] == "Admin") {
    //     header('location:../?q=search');
    // } else {
    //     header('location:../?q=search');
    // }
    header('location:../?q=search');
} else {
    header('location:../login.php');
}
