<?php
session_start();
if (empty($_SESSION['loginSession']) || empty($_SESSION['passwordSession'])) {
    header("Location: ../index.php");
}
?>