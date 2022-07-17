<?php
require_once("Connection.php");

class Service
{
    private $serviceId;
    private $serviceName;
    private $serviceDesc;

    public function getServiceId()
    {
        return $this->serviceId;
    }

    public function getServiceDesc()
    {
        return $this->serviceDesc;
    }

    public function getServiceName()
    {
        return $this->serviceName;
    }

    public function getServiceImg()
    {
        return $this->serviceImg;
    }

    public function setServiceId($serviceId)
    {
        $this->serviceId = $serviceId;
    }

    public function setServiceDesc($serviceDesc)
    {
        $this->serviceDesc = $serviceDesc;
    }

    public function setServiceName($serviceName)
    {
        $this->serviceName = $serviceName;
    }

    public function setServiceImg($serviceImg)
    {
        $this->serviceImg = $serviceImg;
    }

    public function register($service)
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("INSERT INTO servicetb (serviceDesc, serviceName, serviceImg) VALUES (?, ?, ?)");
        $stmt->bindValue(1, $service->getServiceDesc());
        $stmt->bindValue(2, $service->getServiceName());
        $stmt->bindValue(3, $service->getServiceImg());
        $stmt->execute();
    }

    public function delete($service)
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("DELETE FROM servicetb WHERE serviceId = ?");
        $stmt->bindValue(1, $service->getServiceId());
        $stmt->execute();
    }

    public function edit($service)
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("UPDATE servicetb SET serviceDesc = ?, serviceName = ?, serviceImg = ? WHERE serviceId = ?");
        $stmt->bindValue(1, $service->getServiceDesc());
        $stmt->bindValue(2, $service->getServiceName());
        $stmt->bindValue(3, $service->getServiceImg());
        $stmt->bindValue(4, $service->getServiceId());
        $stmt->execute();
    }

    public function list()
    {
        $connection = Connection::connect();
        $stmt = $connection->prepare("SELECT * FROM servicetb");
        $stmt->execute();
        return $stmt;
    }
}
?>