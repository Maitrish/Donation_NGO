<?php 
session_start();
include "constant.php";
$host = "localhost";
$username = "root";
$password = "";
$dbName = "e-helping-hand";

$db = mysqli_connect($host,$username,$password,$dbName);
 
if (!$db) {
    echo "<script type='text/javascript'> console.log('Databse connection error');</script>"; 
} else {
    echo "<script type='text/javascript'> console.log('Database connected Successfully');</script>"; 
}

?>