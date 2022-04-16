<?php
$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');
$db = mysqli_select_db($connection, 'includes');

if (isset($_POST['delete'])) 
{
    $id = $_POST['includesid'];

    $query = "DELETE FROM `includes` WHERE `includes_id`='$id'";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location: viewservices.php");

    }
    else {
        echo '<script> alert("Data Not Deleted"); </script>';
    }

}


?>