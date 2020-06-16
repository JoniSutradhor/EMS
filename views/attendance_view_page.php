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
                <button class="btn btn-outline-success">Add Employee</button>
                <button class="btn btn-outline-success">Take Attendance</button>
            </div>
        </div>
    </section>

    <section class="mt-2 mb-5">
        <div class="container-fluid table-responsive">
            <table class="table table-borderless shadow text-center">
                <thead>
                <tr>
                    <th>Serial</th>
                    <th>Attendance-Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <tr>
                    <td>1</td>
                    <td>14-06-2020</td>
                    <td><button class="btn btn-outline-success">View</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>15-06-2020</td>
                    <td><button class="btn btn-outline-success">View</button></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>16-06-2020</td>
                    <td><button class="btn btn-outline-success">View</button></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>17-06-2020</td>
                    <td><button class="btn btn-outline-success">View</button></td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>
</body>
</html>