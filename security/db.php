<?php 
include "constant.php";
$host = "localhost";
$username = "root";
$password = "";
$dbName = "e-helping-hand";

$db = mysqli_connect($host,$username,$password,$dbName);
 
if (!$db) {
    echo "Databse connection error";
} else {
    echo "Database connected Successfully";
}

?>