<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta id="Viewport" name="viewport" content="initial-scale=1, maximum-scale=1,
        minimum-scale=1, user-scalable=no">
    <title>EMS-Create Employee Profile</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/material_design_input_field.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="../assets/js/bootstrap-datepicker.js"></script>
    <!--    <link rel="stylesheet" href="../../assets/js/toastr.min.js">-->
</head>
<body>
<div class="container col-sm-12 col-md-8 col-lg-8">
    <nav class="d-flex justify-content-center shadow">
        <h5 class="text-blueGray p-2">Create New Employee Profile</h5>
    </nav>

    <div class="container col-md-8">
        <form method="post" action="login.php" style="margin-top: 27.5%">
            <div class="form-group">
                <input type="text" name="employeeName" id="employeeName" class="input-area">
                <label for="employeeName" class="label">Employee Name</label>
                <span class="inputFieldIconStyle"><i class="material-icons text-secondary">account_circle</i></span>
            </div>
            <div class="form-group">
                <input type="number" name="employeePhone" id="employeePhone" class="input-area">
                <label for="employeePhone" class="label">Employee Phone</label>
                <span class="inputFieldIconStyle"><i class="material-icons text-secondary">phone</i></span>
            </div>
            <div class="form-group">
                <input type="number" name="employeeSalary" id="employeeSalary" class="input-area">
                <label for="employeeSalary" class="label">Employee Salary</label>
                <span class="inputFieldIconStyle"><i class="material-icons text-secondary">card_giftcard</i></span>
            </div>
            <div class="form-group">
                <input type="number" name="employeeSalary" id="employeeDesignation" class="input-area">
                <label for="employeeSalary" class="label">Employee Qualification</label>
                <span class="inputFieldIconStyle"><i class="material-icons text-secondary">pan_tool</i></span>
            </div>
            <div class="form-group">
                <input type="text" autocomplete="off" id="picker" class="input-area" />
                <label for="employeeSalary" class="label">Joining Date</label>
                <span class="inputFieldIconStyle"><i class="material-icons text-secondary">date_range</i></span>
            </div>
        </form>
    </div>
</div>

<script>
    $(function () {
        $('.form-group #picker').datepicker({
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