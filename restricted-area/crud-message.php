<?php
include_once("validate-sentinel.php");
require_once("../class/Message.php");

$message = new Message();

$message->setMessageId($_GET["messageId"]);
$message->setClientEmail($_POST["clientEmail"]);
$message->setClientMessage($_POST["clientMessage"]);

if (empty($_GET["messageId"]) && !empty($_POST["clientEmail"]) && !empty($_POST["clientMessage"])) {
    echo $message->register($message);
} else {
    echo $message->delete($message);
}

header("location:show-message.php");
?>