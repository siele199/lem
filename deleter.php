<?php

$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');
$db = mysqli_select_db($connection, 'rider');

if (isset($_POST['delete'])) 
{
    $id = $_POST['riderid'];

    $query = "DELETE FROM `rider` WHERE riderid = '$id' ";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {        echo '<script> alert("Data Deleted"); </script>';        header("Location: admin_urider.php");
    }
    else {        echo '<script> alert("Data Not Deleted"); </script>';
    }

}


?>