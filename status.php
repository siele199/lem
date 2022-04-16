<?php

$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');
$id = $_GET['laundryid'];
$status = $_GET['status'];
$sql = "UPDATE `laundryoption` SET `status`='$status' WHERE `laundryid`=$id";
mysqli_query($connection, $sql);
header('location:viewcategory.php');

?>