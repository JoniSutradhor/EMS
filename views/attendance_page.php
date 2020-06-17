<?php

    $currentDate = date("yy/m/d");
    $currentDay = date("l");

    if (isset($_POST['attendanceSubmit'])){
        $aminulAttendance = $_POST['aminulAttendance'];
        $aminulDebit = $_POST['aminulDebit'];
        $aminulComments = $_POST['aminulComments'];

        $riponAttendance = $_POST['riponAttendance'];
        $riponDebit = $_POST['riponDebit'];
        $riponComments = $_POST['riponComments'];

        $sujanAttendance = $_POST['sujanAttendance'];
        $sujanDebit = $_POST['sujanDebit'];
        $sujanComments = $_POST['sujanComments'];

        $aponAttendance = $_POST['aponAttendance'];
        $aponDebit = $_POST['aponDebit'];
        $aponComments = $_POST['aponComments'];

        $sajibAttendance = $_POST['sajibAttendance'];
        $sajibDebit = $_POST['sajibDebit'];
        $sajibComments = $_POST['sajibComments'];

        $nazmulAttendance = $_POST['nazmulAttendance'];
        $nazmulDebit = $_POST['nazmulDebit'];
        $nazmulComments = $_POST['nazmulComments'];

        $db = mysqli_connect("localhost", "root", "", "ems");

        $aminulQuery = "INSERT INTO attendances (day, date, e_serial, e_name, attendance, debit, credit, payable, comments) VALUES ('$currentDay', '$currentDate', 'NMFH-HD-103', 'AMINUL', '$aminulAttendance', '$aminulDebit', 466.66, 466.66-'$aminulDebit', '$aminulComments')";
        mysqli_query($db, $aminulQuery);

        $riponQuery = "INSERT INTO attendances (day, date, e_serial, e_name, attendance, debit, credit, payable, comments) VALUES ('$currentDay', '$currentDate', 'NMFH-HP-102', 'RIPON', '$riponAttendance', '$riponDebit', 166.66, 166.66-'$riponDebit', '$riponComments')";
        mysqli_query($db, $riponQuery);

        $sujonQuery = "INSERT INTO attendances (day, date, e_serial, e_name, attendance, debit, credit, payable, comments) VALUES ('$currentDay', '$currentDate', 'NMFH-SHD-101', 'SUJAN', '$sujanAttendance', '$sujanDebit', 233.33, 233.33-'$sujanDebit', '$sujanComments')";
        mysqli_query($db, $sujonQuery);

        $aponQuery = "INSERT INTO attendances (day, date, e_serial, e_name, attendance, debit, credit, payable, comments) VALUES ('$currentDay', '$currentDate', 'NMFH-SHD-104', 'APON', '$aponAttendance', '$aponDebit', 200, 200-'$aponDebit', '$aponComments')";
        mysqli_query($db, $aponQuery);

        $sajibQuery = "INSERT INTO attendances (day, date, e_serial, e_name, attendance, debit, credit, payable, comments) VALUES ('$currentDay', '$currentDate', 'NMFH-HD-106', 'SAJIB', '$sajibAttendance', '$sajibDebit', 433.33, 433.33-'$sajibDebit', '$sajibComments')";
        mysqli_query($db, $sajibQuery);

        $nazmulQuery = "INSERT INTO attendances (day, date, e_serial, e_name, attendance, debit, credit, payable, comments) VALUES ('$currentDay', '$currentDate', 'NMFH-HP-105', 'NAZMUL', '$nazmulAttendance', '$nazmulDebit', 100, 100-'$nazmulDebit', '$nazmulComments')";
        mysqli_query($db, $nazmulQuery);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta id="Viewport" name="viewport" content="initial-scale=1, maximum-scale=1,
        minimum-scale=1, user-scalable=no">
    <title>EMS-Attendance Page</title>
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
        <h5 class="text-blueGray p-2">Attendance Page</h5>
    </nav>

    <section class="mt-3">
        <div class="container-fluid">
            <div class="row shadow p-3 d-flex justify-content-between">
                <button class="btn btn-outline-success">Add Employee</button>
                <button class="btn btn-outline-success">View All</button>
            </div>
        </div>
    </section>
    <section class="mt-3">
        <div class="container-fluid d-flex justify-content-around shadow p-2">
            <h5 class="text-secondary">DATE : <?php echo $currentDate ?></h5>
            <h5 class="text-secondary">DAY : <?php echo $currentDay ?></h5>
        </div>
    </section>

    <section class="mt-2 mb-5">
        <div class="container-fluid table-responsive">
            <form action="attendance_page.php" method="post">
                <table class="table table-borderless shadow text-center">
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
                    <tr>
                        <td>1</td>
                        <td>Aminul Haque</td>
                        <td class="d-flex justify-content-center">
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="aminulAttendance" id="present" value="1">
                                <label class="form-check-label" for="present">
                                    P
                                </label>
                            </div>
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="aminulAttendance" id="half" value="0.5">
                                <label class="form-check-label" for="half">
                                    H
                                </label>
                            </div>
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="aminulAttendance" id="absent" value="0" checked>
                                <label class="form-check-label" for="absent">
                                    A
                                </label>
                            </div>
                        </td>
                        <td><input name="aminulDebit" type="text"></td>
                        <td><textarea name="aminulComments"></textarea></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Ripon Mondol</td>
                        <td class="d-flex justify-content-center">
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="riponAttendance" id="present" value="1">
                                <label class="form-check-label" for="present">
                                    P
                                </label>
                            </div>
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="riponAttendance" id="half" value="0.5">
                                <label class="form-check-label" for="half">
                                    H
                                </label>
                            </div>
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="riponAttendance" id="absent" value="0" checked>
                                <label class="form-check-label" for="absent">
                                    A
                                </label>
                            </div>
                        </td>
                        <td><input name="riponDebit" type="text"></td>
                        <td><textarea name="riponComments"></textarea></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Sujan Sarkar</td>
                        <td class="d-flex justify-content-center">
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="sujanAttendance" id="present" value="1">
                                <label class="form-check-label" for="present">
                                    P
                                </label>
                            </div>
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="sujanAttendance" id="half" value="0.5">
                                <label class="form-check-label" for="half">
                                    H
                                </label>
                            </div>
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="sujanAttendance" id="absent" value="0" checked>
                                <label class="form-check-label" for="absent">
                                    A
                                </label>
                            </div>
                        </td>
                        <td><input name="sujanDebit" type="text"></td>
                        <td><textarea name="sujanComments"></textarea></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Apon Sutradhor</td>
                        <td class="d-flex justify-content-center">
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="aponAttendance" id="present" value="1">
                                <label class="form-check-label" for="present">
                                    P
                                </label>
                            </div>
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="aponAttendance" id="half" value="0.5">
                                <label class="form-check-label" for="half">
                                    H
                                </label>
                            </div>
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="aponAttendance" id="absent" value="0" checked>
                                <label class="form-check-label" for="absent">
                                    A
                                </label>
                            </div>
                        </td>
                        <td><input name="aponDebit" type="text"></td>
                        <td><textarea name="aponComments"></textarea></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Sajib Mia</td>
                        <td class="d-flex justify-content-center">
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="sajibAttendance" id="present" value="1">
                                <label class="form-check-label" for="present">
                                    P
                                </label>
                            </div>
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="sajibAttendance" id="half" value="0.5">
                                <label class="form-check-label" for="half">
                                    H
                                </label>
                            </div>
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="sajibAttendance" id="absent" value="0" checked>
                                <label class="form-check-label" for="absent">
                                    A
                                </label>
                            </div>
                        </td>
                        <td><input name="sajibDebit" type="text"></td>
                        <td><textarea name="sajibComments"></textarea></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Nazmul Khan</td>
                        <td class="d-flex justify-content-center">
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="nazmulAttendance" id="present" value="1">
                                <label class="form-check-label" for="present">
                                    P
                                </label>
                            </div>
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="nazmulAttendance" id="half" value="0.5">
                                <label class="form-check-label" for="half">
                                    H
                                </label>
                            </div>
                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="nazmulAttendance" id="absent" value="0" checked>
                                <label class="form-check-label" for="absent">
                                    A
                                </label>
                            </div>
                        </td>
                        <td><input name="nazmulDebit" type="text"></td>
                        <td><textarea name="nazmulComments"></textarea></td>
                    </tr>
                    </tbody>
                </table>
                <div>
                    <button type="submit" name="attendanceSubmit" class="btn btn-outline-success pr-5 pl-5">Save</button>
                </div>
            </form>
        </div>
    </section>
</div>
</body>
</html>