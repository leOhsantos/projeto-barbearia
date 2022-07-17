<?php
include_once("validate-sentinel.php");
require_once("../class/Client.php");

$client = new Client();

$client->setClientId($_POST["clientId"]);
$client->setClientName($_POST["clientName"]);
$client->setClientEmail($_POST["clientEmail"]);
$client->setClientPhone($_POST["clientPhone"]);

if (empty($_POST["clientId"]) && !empty($_POST["clientName"]) && !empty($_POST["clientEmail"]) && !empty($_POST["clientPhone"])) {
    echo $client->register($client);
} else if (!empty($_POST["clientId"])) {
    echo $client->edit($client);
} else {
    $client->setClientId($_GET['clientId']);
    echo $client->delete($client);
}

header("location:show-client.php");
?>