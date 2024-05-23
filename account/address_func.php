<?php
include('../include/config.php');


if (isset($_POST['submit'])) {
    if (!isset($_SESSION['login'])) {
        header('location: ../login.php');
    } else {
        if (isset($_POST['form_type']) == "customer_address") {
            if (isset($_POST["default"])) {
                $status = 1;
            } else {
                $status = 0;
            }
            mysqli_query($con, "insert into address(user_id,name,shippingStreet,shippingAddress,shippingCity,shippingPincode,shippingState,shippingCountry,status,regDate) values('" . $_SESSION['id'] . "','" . $_POST['name'] . "','" . $_POST['shippingStreet'] . "','" . $_POST['shippingAddress'] . "','" . $_POST['shippingCity'] . "','" . $_POST['shippingPincode'] . "','" . $_POST['shippingState'] . "','" . $_POST['shippingCountry'] . "','" . $status . "','" . date("Y-m-d h:i:s") . "')");
            $_SESSION['message'] = "Address added successfully";
            header("Location: addresses.php");
            exit();
        } else {
            header('location: addresses.php');
            exit();
        }
    }
}

if (isset($_GET['delete'])) {
    if (!isset($_SESSION['login'])) {
        header('location: ../index.php');
    } else {
        mysqli_query($con,  "DELETE FROM address WHERE `address`.`id` = '" . $_GET['delete'] . "'");
        $_SESSION['message'] = "Address deleted successfully";
        header("Location: addresses.php");
        exit();
    }
}
