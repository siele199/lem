<?php
  
$connection=mysqli_connect('localhost:3308','root','root','lem');
$db = mysqli_select_db($connection,'users');

if(isset($_POST['delete']))
{
 $id = $_POST['userid'];

 $query = "DELETE FROM `users` WHERE userid = '$id' ";
 $query_run = mysqli_query($connection, $query);
 if($query_run)
 {
echo '<script> alert("Data Deleted"); </script>';
header("Location: admin_customer.php");
 }else{
echo '<script> alert("Data Not Deleted"); </script>';
 }

}
   
?>