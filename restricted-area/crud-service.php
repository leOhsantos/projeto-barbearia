<?php
include_once("validate-sentinel.php");
require_once("../class/Service.php");

$service = new Service();

$service->setServiceId($_POST["serviceId"]);
$service->setServiceDesc($_POST["serviceDesc"]);
$service->setServiceName($_POST["serviceName"]);
$service->setServiceImg($_FILES["serviceImg"]['name']);

$imgName = $_FILES["serviceImg"]['name'];
$file = $_FILES["serviceImg"]['tmp_name'];
$imgPath = "../restricted-area/img/service-img/" . $imgName;
move_uploaded_file($file, $imgPath);

if (empty($_POST["serviceId"]) && !empty($_POST["serviceDesc"]) && !empty($_POST["serviceName"]) && !empty($_FILES["serviceImg"]['name'])) {
    echo $service->register($service);
} else if(!empty($_POST["serviceId"])) {
    echo $service->edit($service);
} else {
    $service->setServiceId($_GET['serviceId']);
    echo $service->delete($service);
}

header("location:show-service.php");
?>