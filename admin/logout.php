<?php
session_start();
if(ISSET($_POST['logout_btn']))
    {
        session_destroy();
        unset($_SESSION['username']);
        header('Location: login.php');
    }

?>