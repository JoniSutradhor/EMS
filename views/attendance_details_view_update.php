<?php

include '../controllers/attendance_details_view_update_controller.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta id="Viewport" name="viewport" content="initial-scale=1, maximum-scale=1,
        minimum-scale=1, user-scalable=no">
    <title>EMS-Attendance Details</title>
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
<div class="container-fluid col-sm-12 col-md-12 col-lg-12">
    <nav class="d-flex justify-content-center shadow">
        <h5 class="text-blueGray p-2">Attendance Details View Page</h5>
    </nav>

    <section class="mt-3">
        <div class="container-fluid">
            <div class="row shadow p-3 d-flex justify-content-between">
                <a href="create_employee_profile.php" class="btn btn-outline-success">Add Employee</a>
                <a href="view_all_attendance.php" class="btn btn-outline-success">Back</a>
            </div>
        </div>
    </section>

    <?php

    if (isset($updateAttendance)){
        echo $updateAttendance;
    }

    ?>

    <section class="mt-3">
        <div class="container-fluid text-center shadow p-2">
            <?php  ?>
            <h5 class="text-secondary">Date: <?php echo $selectedDate ?></h5>
        </div>
    </section>

    <section class="mt-2 mb-5">
        <div class="container-fluid table-responsive">
            <form action="attendance_details_view_update.php?date=<?php echo $selectedDate?>" method="post">
                <table class="table table-borderless shadow text-center text-blueGray">
                    <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Name</th>
                        <th>Attendance</th>
                        <th>Debit</th>
                        <th>Comments</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">

                    <?php

                    $get_employee = $emp->getSelectedDateAttendances($selectedDate);
                    $get_debit = $emp->getSelectedDateDebit($selectedDate);
                    $get_comment = $emp->getSelectedDateComment($selectedDate);
                    if ($get_employee && $get_debit && $get_comment){
                        $serial = 0;
                        while ( ($row = mysqli_fetch_assoc($get_employee)) && ($rowD = mysqli_fetch_assoc($get_debit)) && ($rowC = mysqli_fetch_assoc($get_comment)) ) {

                            $serial++;

                            ?>
                            <tr>
                                <td><?php echo $serial?></td>
                                <td><?php echo $row['e_name'] ?></td>
                                <td class="d-flex justify-content-center">
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" name="attendance[<?php echo $row['e_serial']; ?>]" value="1" <?php if($row['attendance'] == 1) {
                                            echo "checked";
                                        } ?> >
                                        <label class="form-check-label" for="present">
                                            P
                                        </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" name="attendance[<?php echo $row['e_serial']; ?>]" value="0.5" <?php if($row['attendance'] == 0.5) {
                                            echo "checked";
                                        } ?> >
                                        <label class="form-check-label" for="half">
                                            H
                                        </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" name="attendance[<?php echo $row['e_serial']; ?>]" value="0" <?php if($row['attendance'] == 0) {
                                            echo "checked";
                                        } ?> >
                                        <label class="form-check-label" for="absent">
                                            A
                                        </label>
                                    </div>
                                </td>
                                <td><input name="debit[<?php echo $row['e_serial']; ?>]" type="text" value="<?php echo $rowD['debit']; ?>"></td>
                                <td><input name="comment[<?php echo $row['e_serial']; ?>]" type="text" value="<?php echo $rowC['e_comment']; ?>"></td>
                                <input name="dateHidden" value="<?php echo $selectedDate; ?>" type="hidden">
                            </tr>

                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
                <div>
                    <button type="submit" name="attendanceDetailsUpdateSubmit" class="btn btn-outline-success pr-5 pl-5">Update</button>
                </div>
            </form>
        </div>
    </section>
</div>
</body>
</html>