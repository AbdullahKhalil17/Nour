<?php
// session_start();
if(!isset($_SESSION['auth']))
{
    $_SESSION['auth_status'] = "login to Access Dashobord";
    header("Location: login_signup/login.php");
    exit(0);
}
else
{
    if($_SESSION['auth'] == "1")
    {
        
    }
    else
    {
        $_SESSION['status'] = "You are not Authotised as Admin";
        header("Location: ../index.php");
        exit(0);
    }
}
?>