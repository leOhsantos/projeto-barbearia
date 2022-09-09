<?php
include_once("validate-sentinel.php");
require_once("../class/Message.php");

$messageId = $_GET["messageId"];
$clientEmail = $_POST["clientEmail"];
$clientMessage = $_POST["clientMessage"];

$message = new Message();

$message->setMessageId($messageId);
$message->setClientEmail($clientEmail);
$message->setClientMessage($clientMessage);

if (empty($messageId) && !empty($clientEmail) && !empty($clientMessage)) {
    echo $message->register($message);
} else {
    echo $message->delete($message);
}

header("location:show-message.php");
?>