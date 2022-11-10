<?php
session_start();
unset($_SESSION["admin_email"]);
unset($_SESSION["admin_pass"]);
header("Location:login.php");
?>