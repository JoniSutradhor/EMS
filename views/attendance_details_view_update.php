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
                <button class="btn btn-outline-success">Add Employee</button>
                <button class="btn btn-outline-success">Back</button>
            </div>
        </div>
    </section>
    <section class="mt-3">
        <div class="container-fluid text-center shadow p-2">
            <h5 class="text-secondary">Date: 17-06-2020</h5>
        </div>
    </section>

    <section class="mt-2 mb-5">
        <div class="container-fluid table-responsive">
            <form action="" method="">
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
                        <td><input type="text"></td>
                        <td><textarea></textarea></td>
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
                        <td><input type="text"></td>
                        <td><textarea></textarea></td>
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
                        <td><input type="text"></td>
                        <td><textarea></textarea></td>
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
                        <td><input type="text"></td>
                        <td><textarea></textarea></td>
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
                        <td><input type="text"></td>
                        <td><textarea></textarea></td>
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
                        <td><input type="text"></td>
                        <td><textarea></textarea></td>
                    </tr>
                    </tbody>
                </table>
            </form>
            <div>
                <button class="btn btn-outline-success pr-5 pl-5">Update</button>
            </div>
        </div>
    </section>
</div>
</body>
</html>