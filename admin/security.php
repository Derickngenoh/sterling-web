<?php
session_start();

if(!$_SESSION['username']) 
{
    // Redirect to the login page
    header('Location: login.php');
   
}

?>
