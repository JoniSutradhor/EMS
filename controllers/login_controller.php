<?php

$msg = "";

if (isset($_POST['signInSubmit'])){

    $name = $_POST['name'];
    $password = $_POST['password'];

    $db = mysqli_connect("localhost", "root", "", "ems");
    $adminLoginQuery = "SELECT * FROM admins WHERE a_name='$name' AND a_password='$password'";

    $queryResult = mysqli_query($db, $adminLoginQuery);

    $resultCount = mysqli_num_rows($queryResult);

    if ($resultCount == 1){
        header('Location: attendance_page.php');
    }else{
        $msg = "<div class='alert alert-danger'><strong>Error !</strong> Invalid Credentials !</div>";
    }


}