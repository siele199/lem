<?php
$connection = mysqli_connect('localhost:3308', 'root', 'root', 'lem');
function get_laundry(){
    global $connection;
$query = "SELECT * FROM `laundryoption` WHERE status=0";
return $result = mysqli_query($connection,$query);

}
function get_includes(){
    global $connection;
$query = "SELECT * FROM `includes` WHERE status=0";
return $result = mysqli_query($connection,$query);

}

