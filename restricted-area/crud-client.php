<?php
include_once("validate-sentinel.php");
require_once("../class/Client.php");

$clientId = $_POST["clientId"];
$clientName = $_POST["clientName"];
$clientEmail = $_POST["clientEmail"];
$clientPhone = $_POST["clientPhone"];

$client = new Client();

$client->setClientId($clientId);
$client->setClientName($clientName);
$client->setClientEmail($clientEmail);
$client->setClientPhone($clientPhone);

if (empty($clientId) && !empty($clientName) && !empty($clientEmail) && !empty($clientPhone)) {
    echo $client->register($client);
} else if (!empty($clientId) && !empty($clientName) && !empty($clientEmail) && !empty($clientPhone)) {
    echo $client->edit($client);
} else {
    $client->setClientId($_GET['clientId']);
    echo $client->delete($client);
}

header("location:show-client.php");
?>