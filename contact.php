<?php
$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');
if (isset($_POST['submit'])) 
{

    $name = $_POST['fname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $mess = $_POST['mess'];

    $send = "INSERT INTO issues (`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$mess');";
    $send1 = mysqli_query($connection, $send);
    if ($send1) {
        echo $send;

    }
    else {
        echo '<script> alert("Data Not Deleted"); </script>';
    }

}

?>