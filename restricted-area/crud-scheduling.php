<?php
include_once("validate-sentinel.php");
require_once("../class/Scheduling.php");

$schedule = new Scheduling();
$client = new Client();
$service = new Service();

$schedule->setScheduleId($_POST["scheduleId"]);
$schedule->setScheduleDate($_POST["scheduleDate"]);
$schedule->setScheduleHour($_POST["scheduleHour"]);
$client->setClientId($_POST["clientId"]);
$service->setServiceId($_POST["serviceId"]);
$schedule->setClient($client);
$schedule->setService($service);

if (empty($_POST["scheduleId"]) && !empty($_POST["scheduleDate"]) && !empty($_POST["scheduleHour"]) && !empty($_POST["clientId"]) && !empty($_POST["serviceId"])) {
    echo $schedule->register($schedule);
} else if (!empty($_POST["scheduleId"])) {
    echo $schedule->edit($schedule);
} else {
    $schedule->setScheduleId($_GET['scheduleId']);
    echo $schedule->delete($schedule);
}

header("location:show-scheduling.php");
?>