<?php
session_start();
$username = $_SESSION['username'];
$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');
//$username = $_GET['id'];
$released = $_GET['released'];
$sql = "UPDATE `rider` SET `released`='$released' WHERE `username`='$username'";
$sql1 = mysqli_query($connection, $sql);
echo $sql;
header('location:rides.php');

?>