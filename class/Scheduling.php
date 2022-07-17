<?php
require_once("Connection.php");
require_once("Client.php");
require_once("Service.php");


class Scheduling
{
    private $scheduleId;
    private $scheduleDate;
    private $scheduleHour;
    private $client;
    private $service;

    public function getScheduleId()
    {
        return $this->scheduleId;
    }

    public function getScheduleDate()
    {
        return $this->scheduleDate;
    }

    public function getScheduleHour()
    {
        return $this->scheduleHour;
    }

    public function setScheduleId($scheduleId)
    {
        $this->scheduleId = $scheduleId;
    }

    public function setScheduleDate($scheduleDate)
    {
        $this->scheduleDate = $scheduleDate;
    }

    public function setScheduleHour($scheduleHour)
    {
        $this->scheduleHour = $scheduleHour;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getService()
    {
        return $this->service;
    }

    public function setClient($clientId)
    {
        $this->client = $clientId;
    }

    public function setService($serviceId)
    {
        $this->service = $serviceId;
    }

    public function register($schedule)
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("INSERT INTO scheduletb (scheduleDate, scheduleHour, clientId, serviceId) VALUES (?, ?, ?, ?)");
        $stmt->bindValue(1, $schedule->getScheduleDate());
        $stmt->bindValue(2, $schedule->getScheduleHour());
        $stmt->bindValue(3, $schedule->getClient()->getClientId());
        $stmt->bindValue(4, $schedule->getService()->getServiceId());
        $stmt->execute();
    }

    public function delete($schedule)
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("DELETE FROM scheduletb WHERE scheduleId = ?");
        $stmt->bindValue(1, $schedule->getScheduleId());
        $stmt->execute();
    }

    public function edit($schedule)
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("UPDATE scheduletb SET scheduleDate = ?, scheduleHour = ?, clientId = ?, serviceId = ? WHERE scheduleId = ?");
        $stmt->bindValue(1, $schedule->getScheduleDate());
        $stmt->bindValue(2, $schedule->getScheduleHour());
        $stmt->bindValue(3, $schedule->getClient()->getClientId());
        $stmt->bindValue(4, $schedule->getService()->getServiceId());
        $stmt->bindValue(5, $schedule->getScheduleId());
        $stmt->execute();
    }

    public function list()
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("SELECT s.scheduleId, DATE_FORMAT(s.scheduleDate,'%d/%m/%Y') AS scheduleDate, DATE_FORMAT(s.scheduleHour, '%H:%i') AS scheduleHour, c.clientName, se.serviceName, c.clientId, se.serviceId FROM scheduletb s
        INNER JOIN clienttb c
        ON s.clientId = c.clientId
        INNER JOIN servicetb se
        ON s.serviceId = se.serviceId
        ORDER BY scheduleId DESC");
        $stmt->execute();
        return $stmt;
    }
}
?>