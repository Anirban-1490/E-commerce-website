<?php



$dbservername ="localhost";
$username="root";
$password="";
$dbname ="estore";

$connection = mysqli_connect($dbservername,$username,$password,$dbname);

if(!$connection)
{
    die("Connection Failed - ".mysqli_connect_error());
}
