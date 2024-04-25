<?php
session_start();
// error_reporting(0);
include('../include/config.php');
// Code user Registration

$name = $_POST['name'];
$contactno = $_POST['contactno'];
$email = $_POST['email'];
$password = md5($_POST['password']);
if (mysqli_query($con, "insert into users(name,email,contactno,password) values('$name','$email','$contactno','$password')")) {
    header("location: ../register.php");
    $_SESSION['success'] = "User registered successfully";
    exit();
} else {
    header("location: ../register.php");
    $_SESSION['errmsg'] = "User already registered.";
    exit();
}
