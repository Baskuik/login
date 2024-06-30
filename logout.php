<?php
session_start();
//checks if the value is set and then unsets it
if(isset($_SESSION['user_id']))
{
    unset($_SESSION['user_id']);
}
//redirects user to login.php
header("Location: login.php");
die;
?>