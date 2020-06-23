<?php

require '../models/Employee.php';

$emp = new Employee();

date_default_timezone_set('Asia/Dhaka');

$currentDate = date("yy/m/d");
$currentDay = date("l");
$currentTime = date("h:i:s");

if (isset($_POST['attendanceSubmit'])) {

    $attendance = $_POST['attendance'];
    $debit = $_POST['debit'];
    $comment = $_POST['comment'];

    $insertAttendance = $emp->insertAttendance($currentDay, $currentDate, $currentTime, $attendance, $debit, $comment);

}