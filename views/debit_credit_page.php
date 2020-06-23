<?php
require '../models/Database.php';
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
            <div class="input-group mb-3 mr-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">To calender date</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01">
                    <option selected value="1">From Joining Date</option>
                    <option value="2">From Calender Month</option>
                </select>
            </div>
            <div class="form-group mr-3">
                <input type="text" autocomplete="off" id="pickerFromDate" class="input-area" style="padding: 5px!important; padding-left: 40px!important;" />
                <label for="employeeSalary" class="label">Manual From Date</label>
                <span class="inputFieldIconStyle" style="top: 7.5px!important;"><i class="material-icons text-secondary">date_range</i></span>
            </div>
            <div class="form-group">
                <input type="text" autocomplete="off" id="pickerToDate" class="input-area" style="padding: 5px!important; padding-left: 40px!important;" />
                <label for="employeeSalary" class="label">Manual To Date</label>
                <span class="inputFieldIconStyle" style="top: 7.5px!important;"><i class="material-icons text-secondary">date_range</i></span>
            </div>
        </div>
    </section>

    <section class="mt-5">
        <div class="container table-responsive col-md-12">
            <table class="table table-borderless shadow text-center">
                <thead>
                    <tr>
                        <th>Serial</th>
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

                    $currentDate = date("yy/m/d");
                    $db =  new Database();
                    $query = "SELECT * FROM employee_profiles";
                    $result = $db->select($query);
                    $serial = 0;
                    while ($row = mysqli_fetch_assoc($result)){
                        $serial++;
                ?>

                    <tr>
                        <td><?php echo $serial; ?></td>
                        <td><?php echo $row['e_name']; ?></td>
                        <td><?php echo $row['e_joining_date']; ?></td>
                        <td><?php echo $currentDate ?></td>
                        <td>25</td>
                        <td>BDT 10000</td>
                        <td>BDT 11667</td>
                        <td>BDT 1667</td>
                    </tr>
                <?php } ?>
                    <tr class="font-weight-bold">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $currentDate ?></td>
                        <td></td>
                        <td>Total BDT 24500</td>
                        <td>Total BDT 42534</td>
                        <td>Total BDT 16034</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>

<script>
    $(function () {
        $('#pickerFromDate').datepicker({
            'format' : 'dd-mm-yyyy',
            'autoclose' : true,
            // 'useCurrent' : true,
            // 'defaultDate' : true,
            // 'startDate' : 'today',
            // 'endDate' : 'end',
            'todayHighlight' : true,
        });
        $('#pickerToDate').datepicker({
            'format' : 'dd-mm-yyyy',
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