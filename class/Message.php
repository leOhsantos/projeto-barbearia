<?php
require_once("Connection.php");

class Message
{
    private $messageId;
    private $clientEmail;
    private $clientMessage;

    public function getMessageId()
    {
        return $this->messageId;
    }

    public function getClientEmail()
    {
        return $this->clientEmail;
    }

    public function getClientMessage()
    {
        return $this->clientMessage;
    }

    public function setMessageId($messageId)
    {
        $this->messageId = $messageId;
    }

    public function setClientEmail($clientEmail)
    {
        $this->clientEmail = $clientEmail;
    }

    public function setClientMessage($clientMessage)
    {
        $this->clientMessage = $clientMessage;
    }

    public function register($message)
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("INSERT INTO messagetb (clientEmail, clientMessage) VALUES (?, ?)");
        $stmt->bindValue(1, $message->getClientEmail());
        $stmt->bindValue(2, $message->getClientMessage());
        $stmt->execute();
    }

    public function delete($message)
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("DELETE FROM messagetb WHERE messageId = ?");
        $stmt->bindValue(1, $message->getMessageId());
        $stmt->execute();
    }

    public function list()
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("SELECT * FROM messagetb ORDER BY messageId DESC");
        $stmt->execute();
        return $stmt;
    }

    public function countMessagesNumber()
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("SELECT COUNT(messageId) FROM messagetb");
        $stmt->execute();
        return $stmt;
    }
}
?>