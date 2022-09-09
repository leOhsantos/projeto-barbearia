<?php
include_once("validate-sentinel.php");
require_once("../class/Service.php");

$serviceId = $_POST["serviceId"];
$serviceDesc = $_POST["serviceDesc"];
$serviceName = $_POST["serviceName"];
$serviceImg = $_FILES["serviceImg"]['name'];

$service = new Service();

$service->setServiceId($serviceId );
$service->setServiceDesc($serviceDesc);
$service->setServiceName($serviceName);
$service->setServiceImg($serviceImg);

if (empty($_POST["serviceId"]) && !empty($serviceDesc) && !empty($serviceName) && !empty($serviceImg)) {
    $imgName = $serviceImg;
    $file = $_FILES["serviceImg"]['tmp_name'];
    $imgPath = "../restricted-area/img/service-img/" . $imgName;
    move_uploaded_file($file, $imgPath);

    echo $service->register($service);
} else if(!empty($_POST["serviceId"]) && !empty($serviceDesc) && !empty($serviceName) && !empty($serviceImg)) {
    $imgName = $serviceImg;
    $file = $_FILES["serviceImg"]['tmp_name'];
    $imgPath = "../restricted-area/img/service-img/" . $imgName;
    move_uploaded_file($file, $imgPath);

    echo $service->edit($service);
} else if(!empty($_POST["serviceId"]) && !empty($serviceDesc) && !empty($serviceName) && empty($serviceImg)) {
    echo $service->editWithoutImg($service);
} else {
    $service->setServiceId($_GET['serviceId']);
    echo $service->delete($service);
}

header("location:show-service.php");
?>