<?php
//  Code logout
session_start();
include('config/dbcon.php');
if(isset($_POST['logout_btn'])){
  $_SESSION['suc'] = "Logged out Successfully";
  header('Location: login.php');
  exit(0);
}