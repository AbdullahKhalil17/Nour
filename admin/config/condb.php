<?php
$hostname = "localhost";
$databasename = "nour";
$username = "root";
$password = "";
// Connection Database
// $con = mysqli_connect($hostname, $databasename, $username, $password);
$con = mysqli_connect($hostname, $username, $password, $databasename);
// Check Database Connected or No
if ($con->connect_error) {
  die("Connection Failed: " . $con->connect_error);
}
?>