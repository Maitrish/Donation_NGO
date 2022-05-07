<?php
  session_start();
  error_reporting(0);
  if(!(isset($_SESSION["Adminlogin"]) && $_SESSION["Adminlogin"] == "OKADMIN")) {
    header("Location: logout.php");
    exit;
}
?>