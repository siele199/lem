<?php
$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');
$db = mysqli_select_db($connection, 'laundryoption');
if (isset($_POST['edit'])) 
{
    $laundrytitle = $_GET['laundrytitle'];
    $laundryimg = $_GET['laundryimg'];
    $laundrydes = $_GET['laundrydes'];
    $laundryid = $_GET['laundryid'];
    $sql = "UPDATE `laundryoption` SET  `laundry_title`='$laundrytitle',`laundry_img`='$laundryimg',`laundry_des`='$laundrydes' WHERE `laundryoption`.'laundryid'='$laundryid' ";
    $query1 = mysqli_query($connection, $sql);


    if ($connection->query($sql) === TRUE) {
        echo '<script> alert("Laundry Updated"); </script>';

    }
    else {
        echo '<script> alert("Laundry Not Updated"); </script>';
    }
}

?>