<?php
// error_reporting(0);
include('../include/config.php');


if (isset($_GET['pid']) && $_GET['action'] == "cart") {
    if (!isset($_SESSION['id'])) {
        header('location: ../login.php');
    } else {
        mysqli_query($con, "insert into cart(userId,productId) values('" . $_SESSION['id'] . "','$_GET[pid]')");
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_GET['pid']) && $_GET['action'] == "delete-item") {
    if (!isset($_SESSION['id'])) {
        header('location: ../login.php');
    } else {
        mysqli_query($con, "delete from cart where `id` = " . $_GET['pid']);
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
}
