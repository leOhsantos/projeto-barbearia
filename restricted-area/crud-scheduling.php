<?php
include_once("validate-sentinel.php");
require_once("../class/Scheduling.php");

$scheduleId = $_POST["scheduleId"];
$scheduleDate = $_POST["scheduleDate"];
$scheduleHour = $_POST["scheduleHour"];
$clientId = $_POST["clientId"];
$serviceId = $_POST["serviceId"];

$schedule = new Scheduling();
$client = new Client();
$service = new Service();

$schedule->setScheduleId($scheduleId);
$schedule->setScheduleDate($scheduleDate);
$schedule->setScheduleHour($scheduleHour);
$client->setClientId($clientId);
$service->setServiceId($serviceId);
$schedule->setClient($client);
$schedule->setService($service);

if (empty($scheduleId) && !empty($scheduleDate) && !empty($scheduleHour) && !empty($clientId) && !empty($serviceId)) {
    echo $schedule->register($schedule);
} else if (!empty($scheduleId) && !empty($scheduleDate) && !empty($scheduleHour) && !empty($clientId) && !empty($serviceId)) {
    echo $schedule->edit($schedule);
} else {
    $schedule->setScheduleId($_GET['scheduleId']);
    echo $schedule->delete($schedule);
}

header("location:show-scheduling.php");
?>