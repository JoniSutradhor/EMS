<?php
//
require '../models/Employee.php';

$emp = new Employee();
//
date_default_timezone_set('Asia/Dhaka');

$currentDate = date("yy/m/d");
$currentDay = date("l");
$currentTime = date("h:i:s");
//
//if (isset($_POST['getEmpDetailsSubmit'])) {
//
//    $empSerialFromEName = $_POST['empName'];
//    $startingDate = $_POST['startingDate'];
//    $endingDate = $_POST['endingDate'];
//
//    $result_emp_info_total_atn = $emp->getTotalAttendace($empSerialFromEName, $startingDate, $endingDate);
//    $result_emp_info_total_debit = $emp->getTotalDebit($empSerialFromEName, $startingDate, $endingDate);
//
//}
//
//?>
