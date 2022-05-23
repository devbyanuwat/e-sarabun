<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Sarabun</title>
</head>

<?php
session_start();
include('header.php');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 bg-body rounded">
    <div class="container">
        <a class="navbar-brand fs-3" style="text-shadow: 0.5px 0.5px 2px #000000;" href="#">
            <img src="img/logo/kmutnb_logo.png" alt="" width="102" height="102" style="filter: drop-shadow(0 0 0.1rem black);">
            ระบบสารบัญอิเล็กทรอนิกส์ออนไลน์
        </a>
        <div class="d-flex justify-content-end fs-3 ">
            <div class="me-3" style="text-shadow: 0.5px 0.5px 2px #000000;">Anuwat Tansanguan (Role)</div>

            <a href="#">
                <img src="img/icon/logout.png" width="auto" height="35px" style="filter: drop-shadow(0 0 0.1rem black);">
            </a>
        </div>
    </div>
</nav>