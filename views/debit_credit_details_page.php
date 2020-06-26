<?php
require '../controllers/debit_credit_details_controller.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta id="Viewport" name="viewport" content="initial-scale=1, maximum-scale=1,
        minimum-scale=1, user-scalable=no">
    <title>EMS-Debit Credit Details</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/material_design_input_field.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootstrap-datepicker.js"></script>
    <!--    <link rel="stylesheet" href="../../assets/js/toastr.min.js">-->
</head>
<body>
<div class="container col-sm-12 col-md-12 col-lg-12">
    <nav class="d-flex justify-content-center shadow">
        <h5 class="text-blueGray p-2">Emplopyee Debit Credit Details Page</h5>
    </nav>

    <section class="mt-5">
        <div class="container table-responsive col-md-12">
            <table class="table table-bordered table-hover shadow text-center text-blueGray">
                <thead>
                <tr class="text-center text-blueGray">
                    <td colspan="7"><h4>Employee Name : <?php echo $e_name ?></h4></td>
                </tr>
                <tr class="text-blueGray">
                    <th>Day</th>
                    <th>Date</th>
                    <th>Attendance</th>
                    <th>Debit</th>
                    <th colspan="2">Comments</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php

//                $getResult = $emp->debitCreditDetails($e_serial, $e_name, $e_date, $e_date);
//                $count = mysqli_num_rows($getResult);
//
//
//                    while ($count >=1){

                    $db = mysqli_connect("localhost", "root", "", "ems");
                    $getAttendanceQuery = "SELECT * FROM attendances WHERE e_serial='$e_serial' AND date BETWEEN '$s_date' AND '$e_date'";
                    $resultAttendance = mysqli_query($db, $getAttendanceQuery);

                    $getDebitQuery = "SELECT * FROM tbl_debit WHERE e_serial='$e_serial' AND date BETWEEN '$s_date' AND '$e_date'";
                    $resultDebit = mysqli_query($db, $getDebitQuery);

                    $getCommentQuery = "SELECT * FROM tbl_comments WHERE e_serial='$e_serial' AND date BETWEEN '$s_date' AND '$e_date'";
                    $resultComment = mysqli_query($db, $getCommentQuery);
//                    $count = mysqli_fetch_assoc($result);
                    while (($rowAttendance = mysqli_fetch_assoc($resultAttendance)) && ($rowDebit = mysqli_fetch_assoc($resultDebit)) && ($rowComment = mysqli_fetch_assoc($resultComment))){


                ?>
                <tr>
                    <td><?php echo $rowAttendance['day']; ?></td>
                    <td><?php echo $rowAttendance['date']; ?></td>
                    <td><?php echo $rowAttendance['attendance']; ?></td>
                    <td><?php echo $rowDebit['debit']; ?></td>
                    <td colspan="2"><?php echo $rowComment['e_comment']; ?></td>
                </tr>

                <?php } ?>

                </tbody>
                <thead class="text-center">
                <tr>
                    <td colspan="7"></td>
                </tr>
                <tr>
                    <th>From-Date</th>
                    <th>To-Date</th>
                    <th>Total Working Day</th>
                    <th>Total Debit</th>
                    <th>Total Credit</th>
                    <th>Payable</th>
                </tr>
                </thead>

                <?php

                //                $getResult = $emp->debitCreditDetails($e_serial, $e_name, $e_date, $e_date);
                //                $count = mysqli_num_rows($getResult);
                //
                //
                //                    while ($count >=1){

                $db = mysqli_connect("localhost", "root", "", "ems");
                $totalSumQuery = "SELECT *, SUM(attendance) AS t_atn FROM attendances WHERE e_serial='$e_serial' AND date BETWEEN '$s_date' AND '$e_date'";
                $resultAtnSum = mysqli_query($db, $totalSumQuery);

                $totalDebitQuery = "SELECT *, SUM(debit) AS t_debit FROM tbl_debit WHERE e_serial='$e_serial' AND date BETWEEN '$s_date' AND '$e_date'";
                $resultDebitSum = mysqli_query($db, $totalDebitQuery);

                $dailyCreditQuery = "SELECT *, e_salary/30 AS dailyCredit FROM employee_profiles WHERE e_serial='$e_serial'";
                $resultDailyCredit = mysqli_query($db, $dailyCreditQuery);
                //                    $count = mysqli_fetch_assoc($result);
                while (($rowAtnSum = mysqli_fetch_assoc($resultAtnSum)) && ($rowDebitSum = mysqli_fetch_assoc($resultDebitSum)) && ($rowEmpPro = mysqli_fetch_assoc($resultDailyCredit))){


                    ?>

                    <tbody class="text-center">
                    <tr>
                        <?php $total_credit = $rowEmpPro['dailyCredit']*$rowAtnSum['t_atn']; ?>
                        <?php $payable = $total_credit - $rowDebitSum['t_debit']; ?>
                        <td><?php echo $s_date; ?></td>
                        <td><?php echo $e_date; ?></td>
                        <td><?php echo $rowAtnSum['t_atn']; ?></td>
                        <td><?php echo $rowDebitSum['t_debit']; ?></td>
                        <td><?php echo $total_credit; ?></td>
                        <td>
                            <?php
                            if ($payable<=0){
                                echo "<p class='text-danger font-weight-bold'>".$payable."</p>";
                            }else{
                                echo "<p class='text-success font-weight-bold'>".$payable."</p>";
                            }
                            ?>
                        </td>
                    </tr>
                    </tbody>

                <?php } ?>
            </table>

<!--            <div class="table-responsive shadow mb-2">-->
<!--                <table class="table table-bordered">-->
<!---->
<!--                    <thead class="text-center">-->
<!--                    <tr>-->
<!--                        <th>Name</th>-->
<!--                        <th>From-Date</th>-->
<!--                        <th>To-Date</th>-->
<!--                        <th>Workind-Day</th>-->
<!--                        <th>Debit</th>-->
<!--                        <th>Credit</th>-->
<!--                        <th>Payable</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!---->
<!--                    --><?php
//
//                    //                $getResult = $emp->debitCreditDetails($e_serial, $e_name, $e_date, $e_date);
//                    //                $count = mysqli_num_rows($getResult);
//                    //
//                    //
//                    //                    while ($count >=1){
//
//                    $db = mysqli_connect("localhost", "root", "", "ems");
//                    $totalSumQuery = "SELECT *, SUM(attendance) AS t_atn FROM attendances WHERE e_serial='$e_serial' AND date BETWEEN '$s_date' AND '$e_date'";
//                    $resultAtnSum = mysqli_query($db, $totalSumQuery);
//
//                    $totalDebitQuery = "SELECT *, SUM(debit) AS t_debit FROM tbl_debit WHERE e_serial='$e_serial' AND date BETWEEN '$s_date' AND '$e_date'";
//                    $resultDebitSum = mysqli_query($db, $totalDebitQuery);
//
//                    $dailyCreditQuery = "SELECT *, e_salary/30 AS dailyCredit FROM employee_profiles WHERE e_serial='$e_serial'";
//                    $resultDailyCredit = mysqli_query($db, $dailyCreditQuery);
//                    //                    $count = mysqli_fetch_assoc($result);
//                    while (($rowAtnSum = mysqli_fetch_assoc($resultAtnSum)) && ($rowDebitSum = mysqli_fetch_assoc($resultDebitSum)) && ($rowEmpPro = mysqli_fetch_assoc($resultDailyCredit))){
//
//
//                    ?>
<!---->
<!--                    <tbody class="text-center">-->
<!--                        <tr>-->
<!--                            --><?php //$total_credit = $rowEmpPro['dailyCredit']*$rowAtnSum['t_atn']; ?>
<!--                            --><?php //$payable = $total_credit - $rowDebitSum['t_debit']; ?>
<!--                            <td>--><?php //echo $rowEmpPro['e_name']; ?><!--</td>-->
<!--                            <td>--><?php //echo $s_date; ?><!--</td>-->
<!--                            <td>--><?php //echo $e_date; ?><!--</td>-->
<!--                            <td>--><?php //echo $rowAtnSum['t_atn']; ?><!--</td>-->
<!--                            <td>--><?php //echo $rowDebitSum['t_debit']; ?><!--</td>-->
<!--                            <td>--><?php //echo $total_credit; ?><!--</td>-->
<!--                            <td>-->
<!--                                --><?php
//                                if ($payable<=0){
//                                    echo "<p class='text-danger font-weight-bold'>".$payable."</p>";
//                                }else{
//                                    echo "<p class='text-success font-weight-bold'>".$payable."</p>";
//                                }
//                                ?>
<!--                            </td>-->
<!--                        </tr>-->
<!--                    </tbody>-->
<!---->
<!--                    --><?php //} ?>
<!--                </table>-->
<!--            </div>-->
        </div>
    </section>
</div>
</body>
</html>