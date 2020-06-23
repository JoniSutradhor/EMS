<?php

require '../models/Employee.php';

$emp = new Employee();

if (isset($_POST['createEmployeeProfileSubmit'])){

    $employeeSerial = $_POST['employeeSerial'];
    $employeeName = $_POST['employeeName'];
    $employeePhone = $_POST['employeePhone'];
    $employeeSalary = $_POST['employeeSalary'];
    $employeeQualification = $_POST['employeeQualification'];
    $employeeJoiningDate = $_POST['employeeJoiningDate'];

    $insertEmployeeData = $emp->insertEmployee($employeeSerial, $employeeName, $employeePhone, $employeeSalary, $employeeQualification, $employeeJoiningDate);

}

?>