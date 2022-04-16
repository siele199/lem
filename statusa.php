<?php

$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');
$id = $_GET['id'];
$status = $_GET['status'];
$sql = "UPDATE `includes` SET `status`='$status' WHERE `includes_id`='$id'";
mysqli_query($connection, $sql);
header('location:viewservices.php');

?>