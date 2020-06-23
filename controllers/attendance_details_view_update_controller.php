<?php

require '../models/Employee.php';

$emp = new Employee();

date_default_timezone_set('Asia/Dhaka');

$selectedDate = $_GET['date'];
$currentDate = date("yy/m/d");
$currentDay = date("l");
$currentTime = date("h:i:s");

if (isset($_POST['attendanceDetailsUpdateSubmit'])) {


    $date = $_POST['dateHidden'];
    $attendance = $_POST['attendance'];
    $debit = $_POST['debit'];
    $comment = $_POST['comment'];

    $updateAttendance = $emp->updateAttendance($date, $currentDay, $currentDate, $currentTime, $attendance, $debit, $comment);

}
?>

