<?php

require '../models/Employee.php';

$emp = new Employee();

date_default_timezone_set('Asia/Dhaka');

$currentDate = date("yy/m/d");
$currentDay = date("l");
$currentTime = date("h:i:s");

?>
