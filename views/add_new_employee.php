<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta id="Viewport" name="viewport" content="initial-scale=1, maximum-scale=1,
        minimum-scale=1, user-scalable=no">
    <title>EMS-Add New Employee</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/material_design_input_field.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!--    <link rel="stylesheet" href="../../assets/js/toastr.min.js">-->
</head>
<body>
<div class="container col-sm-12 col-md-12 col-lg-12">
    <nav class="d-flex justify-content-center shadow">
        <h5 class="text-blueGray p-2">Add New Employee</h5>
    </nav>

    <section class="mt-3">
        <div class="container-fluid">
            <div class="row shadow p-3 d-flex justify-content-between">
                <button class="btn btn-outline-success">Add Employee</button>
                <button class="btn btn-outline-success">Take Attendance</button>
            </div>
        </div>
    </section>

    <section class="mt-5 mb-5">
        <div class="container-fluid shadow p-5">
            <form action="" method="">
                <div class="form-group">
                    <input type="text" name="employeeName" id="employeeName" class="input-area">
                    <label for="employeeName" class="label">Employee Name</label>
                    <span class="inputFieldIconStyle"><i class="material-icons text-secondary">account_circle</i></span>
                </div>
                <div class="form-group">
                    <input type="number" name="employeeSerial" id="employeeSerial" class="input-area">
                    <label for="employeeSerial" class="label">Employee Serial</label>
                    <span class="inputFieldIconStyle"><i class="material-icons text-secondary">plus_one</i></span>
                </div>
                <div class="text-center mt-3">
                    <input type="submit" name="addEmployee" class="btn w-100 pt-2 pb-2" style="border: 1px solid gray; color: #6B9790; font-weight: bold" value="Add Employee">
                </div>
            </form>
        </div>
    </section>
</div>
</body>
</html>