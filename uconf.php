
 <?php


$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');
$db = mysqli_select_db($connection, 'rider');
$id = $_POST['id'];

if (isset($_POST['confirm'])) 
{

    $sql = "UPDATE `rider` SET`approve`='0' WHERE riderid = '$id' ";
    $query_run = mysqli_query($connection, $sql);
    if ($query_run) {
        echo '<script> alert("Rider Confirmed"); </script>';
        header("Location: admin_crider.php");
    }
    else {
        echo '<script> alert("Rider Not Confirmed"); </script>';
    }

}


?>