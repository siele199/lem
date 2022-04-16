<?php
session_start();
if (isset($_GET['id'])) {

    if (isset($_GET['qty'])) {
        $qty = $_GET['qty'];
    }
    else {
        $qty = 1;
    }
    $id = $_GET['id'];

    $_SESSION['cart'][$id] = array('qty' => $qty);


    echo '<pre>';
    print_r($_SESSION['cart']);
    echo '</pre>';
}
?>