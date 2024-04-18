<?php
include('../config/condb.php');
if(isset($_POST['loginbtn']))
{
  $email = $_POST['email'];
  $password = $_POST['password'];

  $log_query = "SELECT * FROM admin Where (email='$email') AND password='$password' LIMIT 1";
  $log_query_run = mysqli_query($con, $log_query);
  if(mysqli_num_rows($log_query_run) > 0)
  {
    header("location: ../index.php");
  }
  else
  {
    $error = "Your Login Name or Password is invalid";
  }
}

?>