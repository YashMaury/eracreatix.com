<?php
// error_reporting(0);
include('../include/config.php');


if (isset($_GET['pid']) && $_GET['action'] == "wishlist") {
    if (strlen($_SESSION['login']) == 0) {
        header('location:login.php');
    } else {
        mysqli_query($con, "insert into wishlist(userId,productId) values('" . $_SESSION['id'] . "','$pid')");
        header('location: '. $_SERVER['HTTP_REFERER']);
    }
}
