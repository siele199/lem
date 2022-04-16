<?php


$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');
$db = mysqli_select_db($connection, 'users');

if (isset($_POST['delete'])) 
{
    $id = $_POST['orderid'];

    $query = "DELETE FROM `order1` WHERE id = '$id' ";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:vieworders.php");
    }
    else {
        echo '<script> alert("Data Not Deleted"); </script>';
    }

}


?>