<?php
require '../controllers/debit_credit_controller.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta id="Viewport" name="viewport" content="initial-scale=1, maximum-scale=1,
        minimum-scale=1, user-scalable=no">
    <title>EMS-Debit Credit</title>
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
        <h5 class="text-blueGray p-2">Emplopyee Debit Credit Payable</h5>
    </nav>

    <section class="mt-3">
        <div class="container-fluid d-flex justify-content-center text-center shadow pl-3 pr-3 pt-4">
            <form action="debit_credit_page.php" method="post">
                <div class="input-group mb-3 mr-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Select An Employee</label>
                    </div>
                    <select name="empName" class="custom-select" id="inputGroupSelect01">
                        <option selected value="1">Select employee name</option>
                        <?php $all_employee = $emp->getEmployee();
                        while ($row = mysqli_fetch_assoc($all_employee)){
                            ?>
                            <option value="<?php echo $row['e_serial']; ?>"><?php echo $row['e_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <input name="startingDate" type="text" autocomplete="off" id="pickerFromDate" class="input-area" style="padding: 5px!important; padding-left: 40px!important;" />
                    <label for="employeeSalary" class="label">Manual From Date</label>
                    <span class="inputFieldIconStyle" style="top: 7.5px!important;"><i class="material-icons text-secondary">date_range</i></span>
                </div>
                <div class="form-group">
                    <input name="endingDate" type="text" autocomplete="off" id="pickerToDate" class="input-area" style="padding: 5px!important; padding-left: 40px!important;" />
                    <label for="employeeSalary" class="label">Manual To Date</label>
                    <span class="inputFieldIconStyle" style="top: 7.5px!important;"><i class="material-icons text-secondary">date_range</i></span>
                </div>
                <div class="form-group">
                    <button name="getEmpDetailsSubmit" type="submit" class="btn btn-outline-success pl-5 pr-5 ml-3">Submit</button>
                </div>
            </form>
        </div>
    </section>

    <section class="mt-5">
        <div class="container table-responsive col-md-12">
            <table class="table table-borderless shadow text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>From-Date</th>
                        <th>To-Date</th>
                        <th>Workind-Day</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Payable</th>
                    </tr>
                </thead>
                <tbody class="text-center">

                <?php
//                    $eSerial = "NMFH-HD-103";
//                    $sd = "2020/06/01";
//                    $ed = "2020/06/23";
//                    $get_total_attendance = $emp->getTotalAttendace($eSerial, $sd, $ed);
//                    $get_total_debit = $emp->getTotalDebit($eSerial, $sd, $ed);

                if (isset($_POST['getEmpDetailsSubmit'])) {

                    $empSerialFromEName = $_POST['empName'];
                    $startingDate = $_POST['startingDate'];
                    $endingDate = $_POST['endingDate'];

                    $result_emp_info = $emp->getEmployeeInfo($empSerialFromEName);
                    $result_emp_info_total_atn = $emp->getTotalAttendace($empSerialFromEName, $startingDate, $endingDate);
                    $result_emp_info_total_debit = $emp->getTotalDebit($empSerialFromEName, $startingDate, $endingDate);


                    if ($result_emp_info_total_atn && $result_emp_info_total_debit && $result_emp_info) {
                    while (($rowAtn = mysqli_fetch_assoc($result_emp_info_total_atn)) && ($rowDebit = mysqli_fetch_assoc($result_emp_info_total_debit)) && ($rowEmpInfo = mysqli_fetch_assoc($result_emp_info))) {
                ?>

                    <tr>
                        <td><?php echo $rowEmpInfo['e_name']; ?></td>
                        <td><?php echo $startingDate; ?></td>
                        <td><?php echo $endingDate ?></td>
                        <td><?php echo $rowAtn['atn_sum'] ?></td>
                        <td><?php echo $rowDebit['t_debit'] ?></td>
                        <td>BDT 11667</td>
                        <td>BDT 1667</td>
                    </tr>
                <?php } } }?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<script>
    $(function () {
        $('#pickerFromDate').datepicker({
            'format' : 'yyyy/mm/dd',
            'autoclose' : true,
            // 'useCurrent' : true,
            // 'defaultDate' : true,
            // 'startDate' : 'today',
            // 'endDate' : 'end',
            'todayHighlight' : true,
        });
        $('#pickerToDate').datepicker({
            'format' : 'yyyy/mm/dd',
            'autoclose' : true,
            // 'useCurrent' : true,
            // 'defaultDate' : true,
            // 'startDate' : 'today',
            // 'endDate' : 'end',
            'todayHighlight' : true,
        });
    })
</script>
</body>
</html>