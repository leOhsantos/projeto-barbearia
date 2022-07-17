<?php
require_once("class/Connection.php");

$userLogin = preg_replace('/[^[:alpha:]_]/', '',$_POST["userLogin"]);
$userPassword = $_POST['userPassword'];

$connection = Connection::connect();
$stmt = $connection->prepare("SELECT userLogin, userPassword FROM usertb WHERE userLogin LIKE '$userLogin' AND userPassword LIKE '$userPassword';");
$stmt ->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($userLogin === @$row[0]['userLogin'] && $userPassword === @$row[0]['userPassword']) {
    session_start();
    $_SESSION['loginSession'] = $userLogin;
    $_SESSION['passwordSession'] = $userPassword;
    echo "<script>window.location.replace('restricted-area/show-scheduling.php')</script>";
} else {
    echo "<script>window.location.replace('user-login.php')</script>";
}
?>