<?php
include('../include/config.php');


if (isset($_POST['submit'])) {
    if (!isset($_SESSION['login'])) {
        header('location: ../login.php');
    } else {
        if (isset($_POST['form_type']) == "place_order") {
            $cart = mysqli_query($con, "select * from cart where `userId` = '" . $_SESSION['id'] . "' ");
            $fetch_cart = mysqli_fetch_array($cart);
            foreach ($_POST['method'] as $methods) {
                $method = $methods;
            }
            foreach ($cart as $key => $value) {
                mysqli_query($con, "insert into orders(userId,productId,quantity,address,orderDate, paymentMethod) values('" . $_SESSION['id'] . "','" . $value['productId'] . "','" . $value['quantity'] . "','" . $_POST['address'] . "','" . date("Y-m-d h:i:s") . "', '" . $method . "')");
                mysqli_query($con, "DELETE FROM cart WHERE `cart`.`id` = '" . $value['id'] . "'");
            }
            $_SESSION['message'] = "Order placed successfully";
            header("Location: shipping-details-page.php");
            exit();
        } else {
            header('location: checkout.php');
            exit();
        }
    }
}

// if (isset($_GET['delete'])) {
//     if (!isset($_SESSION['login'])) {
//         header('location: ../index.php');
//     } else {
//         mysqli_query($con,  "DELETE FROM address WHERE `address`.`id` = '" . $_GET['delete'] . "'");
//         $_SESSION['message'] = "Address deleted successfully";
//         header("Location: addresses.php");
//         exit();
//     }
// }
