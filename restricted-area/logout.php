<?php
session_start();
unset($_SESSION['loginSession']);
unset($_SESSION['passwordSession']);
session_destroy();
header("Location: ../index.php");
?>