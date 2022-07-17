<?php
require_once("Connection.php");

class Client
{
    private $clientId;
    private $clientName;
    private $clientEmail;
    private $clientPhone;

    public function getClientId()
    {
        return $this->clientId;
    }

    public function getClientName()
    {
        return $this->clientName;
    }

    public function getClientEmail()
    {
        return $this->clientEmail;
    }

    public function getClientPhone()
    {
        return $this->clientPhone;
    }

    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    }

    public function setClientName($clientName)
    {
        $this->clientName = $clientName;
    }

    public function setClientEmail($clientEmail)
    {
        $this->clientEmail = $clientEmail;
    }

    public function setClientPhone($clientPhone)
    {
        $this->clientPhone = $clientPhone;
    }

    public function register($client)
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("INSERT INTO clienttb (clientName, clientEmail, clientPhone) VALUES (?, ?, ?)");
        $stmt->bindValue(1, $client->getClientName());
        $stmt->bindValue(2, $client->getClientEmail());
        $stmt->bindValue(3, $client->getClientPhone());
        $stmt->execute();
    }

    public function delete($client)
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("DELETE FROM clienttb WHERE clientId = ?");
        $stmt->bindValue(1, $client->getClientId());
        $stmt->execute();
    }

    public function edit($client)
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("UPDATE clienttb SET clientName = ?, clientEmail = ?, clientPhone = ? WHERE clientId = ?");
        $stmt->bindValue(1, $client->getClientName());
        $stmt->bindValue(2, $client->getClientEmail());
        $stmt->bindValue(3, $client->getClientPhone());
        $stmt->bindValue(4, $client->getClientId());
        $stmt->execute();
    }

    public function list()
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("SELECT * FROM clienttb ORDER BY clientId DESC");
        $stmt->execute();
        return $stmt;
    }
}
?>