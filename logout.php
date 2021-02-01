<?php
    session_start();
    unset($_SESSION["Password"]);
    unset($_SESSION["User_Name"]);
    header("Location:index.php");
?>