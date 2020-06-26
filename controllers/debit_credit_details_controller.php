<?php

require '../models/Employee.php';

$emp = new Employee();

date_default_timezone_set('Asia/Dhaka');

$currentDate = date("yy/m/d");
$currentDay = date("l");
$currentTime = date("h:i:s");

$e_serial = $_GET['e_serial'];
$e_name = $_GET['e_name'];
$s_date = $_GET['s_date'];
$e_date = $_GET['e_date'];

?>
