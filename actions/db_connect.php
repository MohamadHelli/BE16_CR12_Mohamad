<?php
$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "be16_cr12_lacasamia_mohamad";



$connect = mysqli_connect($localhost, $username, $password, $dbname);

if (!$connect){
    die("connection failed :" . mysqli_connect_error());
}
// else {
//     echo "connected successfully";
// }
