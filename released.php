
 <?php


$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');
$db = mysqli_select_db($connection, 'rider');
$id = $_POST['id'];
$oid =$_POST['oid'];

if (isset($_POST['release'])) 
{

    $sql = "UPDATE `rider` SET`released`='0',`available`='0'  WHERE riderid = '$id' ";
$sql1 = "UPDATE `order1` SET`delivered`='1' WHERE id = '$oid' ";
$query_run1 = mysqli_query($connection, $sql1);
    $query_run = mysqli_query($connection, $sql);
    if ($query_run) {
        echo '<script> alert("Rider Has Been Released"); </script>';
        header("Location: release.php");
    }
    else {
        echo '<script> alert("Rider Has Not Been Released"); </script>';
    }

}


?>