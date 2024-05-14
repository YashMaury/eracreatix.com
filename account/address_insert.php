<?php
include('../include/config.php');


if (isset($_POST['submit'])) {
    if (!isset($_SESSION['login'])) {
        header('location: ../login.php');
    } else {
        if (isset($_POST['form_type']) == "customer_address") {
            mysqli_query($con, "insert into address(user_id,name,shippingStreet,shippingAddress,shippingCity,shippingPincode,shippingState,shippingCountry,regDate) values('" . $_SESSION['id'] . "','" . $_POST['name'] . "','" . $_POST['shippingStreet'] . "','" . $_POST['shippingAddress'] . "','" . $_POST['shippingCity'] . "','" . $_POST['shippingPincode'] . "','" . $_POST['shippingState'] . "','" . $_POST['shippingCountry'] . "','" . date("Y-m-d h:i:s") . "')");
            $_SESSION['message'] = "Address added successfully";
            header("Location: addresses.php");
            exit();
        } else {
            header('location: addresses.php');
            exit();
        }
    }
}
?>