<?php
require 'Database.php';
?>

<?php

class Employee{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getEmployee(){
        $query = "SELECT * FROM employee_profiles";
        $result = $this->db->select($query);
        return $result;
//
//        $query2 = "SELECT * FROM tbl_debit";
//        $result2= $this->db->select($query2);
//        return $result2;
//
//        $query3 = "SELECT * FROM tbl_comments";
//        $result3= $this->db->select($query3);
//        return $result3;
    }

    public function getSelectedDateAttendances($selectedDate){
//        $db = mysqli_connect("localhost", "root", "", "ems");
//        $query = "SELECT atn.attendance, emp_pro.e_name, tbl_debit.debit, tbl_comments.comment FROM attendances atn JOIN employee_profiles emp_pro ON atn.e_serial = emp_pro.e_serial JOIN tbl_debit ON tlb_debit.e_serial = atn.e_seial JOIN tbl_comments ON atn.e_serial = tbl_comments.e_serial WHERE date='$selectedDate'";
        $query = "SELECT * FROM attendances atn JOIN employee_profiles emp_pro ON atn.e_serial = emp_pro.e_serial WHERE date='$selectedDate'";
//        $query = "SELECT atn.attendance, emp_pro.e_name, emp_pro.e_name, tbl_comments.comment, tbl_debit.debit FROM attendances atn JOIN employee_profiles emp_pro, tbl_debit, tbl_comments ON atn.e_serial = emp_pro.e_serial = tbl_debit.e_serial = tbl_comments.e_serial WHERE date='$selectedDate'";
//        $result = $this->db->select($query);
        $result = $this->db->select($query);
        return $result;


    }

    public function getSelectedDateDebit($selectedDate){
//        $db = mysqli_connect("localhost", "root", "", "ems");
        $queryDebit = "SELECT * FROM tbl_debit WHERE date='$selectedDate'";
//        $queryDebit = "SELECT * FROM tbl_debit t_d JOIN employee_profiles emp_pro ON t_d.e_serial = emp_pro.e_serial WHERE date='$selectedDate'";
        $result2 = $this->db->select($queryDebit);
        return $result2;
    }

    public function getSelectedDateComment($selectedDate){
//        $db = mysqli_connect("localhost", "root", "", "ems");
        $queryComments = "SELECT * FROM tbl_comments WHERE date='$selectedDate'";
//        $queryComments = "SELECT * FROM tbl_comments t_c JOIN employee_profiles emp_pro ON t_c.e_serial = emp_pro.e_serial WHERE date='$selectedDate'";
        $result3 = $this->db->select($queryComments);
        return $result3;
    }


    public function insertEmployee($employeeSerial, $employeeName, $employeePhone, $employeeSalary, $employeeQualification, $employeeJoiningDate){

        if (empty($employeeSerial) || empty($employeeName) || empty($employeePhone) || empty($employeeSalary) || empty($employeeQualification) || empty($employeeJoiningDate)){
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Field must not be empty !</div>";
            return $msg;
        }else{
            $insert_employee_query = "INSERT INTO employee_profiles (e_serial, e_name, e_phone, e_salary, e_qualification, e_joining_date) VALUES ('$employeeSerial', '$employeeName', '$employeePhone', '$employeeSalary', '$employeeQualification', '$employeeJoiningDate')";

            $employee_insert = $this->db->insert($insert_employee_query);

            if ($employee_insert){
                $msg = "<div class='alert alert-success'><strong>Success !</strong> Employee profile created successfully</div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-danger'><strong>Error !</strong> Employee profile not created !</div>";
                return $msg;
            }
        }
    }

    public function insertAttendance($currentDay, $currentDate, $currentTime, $attendance = array(), $debit = array(), $comment = array()) {

        $date_check_query = "SELECT * FROM attendancedates WHERE date='$currentDate'";
        $manual_db = mysqli_connect("localhost", "root", "", "ems");

        $result_date_check = mysqli_query($manual_db, $date_check_query);
        $count_date = mysqli_num_rows($result_date_check);

        if ($count_date >=1){
            $msg = "<div class='alert alert-danger'><strong>Error !</strong> Attendance already taken today !</div>";
            return $msg;
        }else{
            foreach ($debit as $debit_key => $debit_value){
                $debit_insert_query = "INSERT INTO tbl_debit (day, date, e_serial, debit) VALUES ('$currentDay', '$currentDate', '$debit_key', '$debit_value')";
                $debit_insert = $this->db->insert($debit_insert_query);
            }

            foreach ($comment as $comment_key => $comment_value){
                $comment_insert_query = "INSERT INTO tbl_comments (day, date, e_serial, e_comment) VALUES ('$currentDay', '$currentDate', '$comment_key', '$comment_value')";
                $comment_insert = $this->db->insert($comment_insert_query);
            }

            foreach ($attendance as $e_serial => $attendance_value){
                $attendance_insert_query = "INSERT INTO attendances (day, date, e_serial, attendance) VALUES ('$currentDay', '$currentDate', '$e_serial', '$attendance_value')";
                $attendance_insert = $this->db->insert($attendance_insert_query);
            }


            if ($attendance_insert && $debit_insert && $comment_insert){

                $attandenceDateInsertQuery = "INSERT INTO attendancedates (day, date, time) VALUES ('$currentDay', '$currentDate', '$currentTime')";
                $this->db->insert($attandenceDateInsertQuery);

                $msg = "<div class='alert alert-success'><strong>Success !</strong> Employee attendance save successfully</div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-danger'><strong>Error !</strong> Employee attendance fail to save !</div>";
                return $msg;
            }
        }
    }

    public function updateAttendance($selectedDate, $currentDay, $currentDate, $currentTime, $attendance = array(), $debit = array(), $comment = array()) {

        $manual_db = mysqli_connect("localhost", "root", "", "ems");
//        $date_check_query = "SELECT * FROM attendancedates WHERE date='$currentDate'";
//
//        $result_date_check = mysqli_query($manual_db, $date_check_query);
//        $count_date = mysqli_num_rows($result_date_check);

//        if ($count_date == 1){
            foreach ($debit as $debit_key => $debit_value){
                $debit_update_query = "UPDATE tbl_debit SET debit='$debit_value' WHERE date='$selectedDate' AND e_serial='$debit_key'";
                $debit_update = $this->db->update($debit_update_query);
            }

            foreach ($comment as $comment_key => $comment_value){
                $comment_update_query = "UPDATE tbl_comments SET e_comment='$comment_value' WHERE date='$selectedDate' AND e_serial='$comment_key'";
                $comment_update = $this->db->update($comment_update_query);
            }

            foreach ($attendance as $e_serial => $attendance_value){
                $attendance_update_query = "UPDATE attendances SET attendance='$attendance_value' WHERE date='$selectedDate' AND e_serial='$e_serial'";
                $attendance_update = $this->db->update($attendance_update_query);
            }



            if ($attendance_update && $debit_update && $comment_update){
//                $update_number = 1;
                $attandenceDateInsertQuery = "UPDATE attendancedates SET updated_time='$currentTime' WHERE date='$selectedDate'";
                $this->db->update($attandenceDateInsertQuery);

                $msg = "<div class='alert alert-success'><strong>Success !</strong> Employee attendance updated successfully</div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-danger'><strong>Error !</strong> Employee attendance fail to update !</div>";
                return $msg;
            }
        }

        public function getTotalAttendace($empSerialFromEName, $startingDate, $endingDate){
//            $db = mysqli_connect("localhost", "root", "", "ems");
            $emp_info_total_atn_query = "SELECT *, SUM(attendance) AS atn_sum FROM attendances WHERE e_serial='$empSerialFromEName' AND date BETWEEN '$startingDate' AND '$endingDate'";

//            $result_emp_info_total_atn = mysqli_query($db, $emp_info_total_atn_query);
            $result_emp_info_total_atn = $this->db->select($emp_info_total_atn_query);
            return $result_emp_info_total_atn;
        }

        public function getTotalDebit($empSerialFromEName, $startingDate, $endingDate){
//            $db = mysqli_connect("localhost", "root", "", "ems");
            $emp_info_total_debit_query = "SELECT *, SUM(debit) AS t_debit FROM tbl_debit WHERE e_serial='$empSerialFromEName' AND date BETWEEN '$startingDate' AND '$endingDate'";
//            $result_emp_info_total_debit = mysqli_query($db, $emp_info_total_debit_query);
            $result_emp_info_total_debit = $this->db->select($emp_info_total_debit_query);
            return $result_emp_info_total_debit;
        }

        public function getEmployeeInfo($eSerial){
//            $db = mysqli_connect("localhost", "root", "", "ems");
            $emp_info_total_credit_query = "SELECT *, e_salary/30 AS dailyCredit FROM employee_profiles WHERE e_serial='$eSerial'";
//            $result_emp_info_total_debit = mysqli_query($db, $emp_info_total_debit_query);
            $result_emp_info_total_credit = $this->db->select($emp_info_total_credit_query);
            return $result_emp_info_total_credit;
        }
//    }


//        public function debitCreditDetails($eName, $eSerial, $sDate, $eDate) {
//            $query = "SELECT * FROM attendances WHERE e_serial='$eSerial'";
//            $result = $this->db->select($query);
//            return $result;
//        }

}

?>
