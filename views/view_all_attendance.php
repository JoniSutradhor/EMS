<?php

require '../models/Database.php';

$db = new Database();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta id="Viewport" name="viewport" content="initial-scale=1, maximum-scale=1,
        minimum-scale=1, user-scalable=no">
    <title>EMS-Attendance View</title>
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
        <h5 class="text-blueGray p-2">Attendance View</h5>
    </nav>

    <section class="mt-3">
        <div class="container-fluid">
            <div class="row shadow p-3 d-flex justify-content-between">
                <a href="create_employee_profile.php" class="btn btn-outline-success">Add Employee</a>
                <a href="debit_credit_page.php" class="btn btn-outline-success">Calculation</a>
                <a href="attendance_page.php" class="btn btn-outline-success">Take Attendance</a>
            </div>
        </div>
    </section>

    <section class="mt-2 mb-5">
        <div class="container-fluid table-responsive">
            <table class="table table-borderless shadow text-center text-blueGray">
                <thead>
                <tr>
                    <th>Serial</th>
                    <th>Attendance-Day</th>
                    <th>Attendance-Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php

                $serial = 1;
//                $db = mysqli_connect("localhost", "root", "", "ems");
                $query = "SELECT * FROM attendancedates";
                $result = $db->select($query);
                ?>
                <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $serial++ ?></td>
                    <td><?php echo $row['day']?></td>
                    <td><?php echo $row['date']?></td>
                    <?php echo "<td><a href=\"attendance_details_view_update.php?date=".$row['date']."\" class=\"btn btn-outline-success\">View</a></td>" ?>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</div>
</body>
</html>