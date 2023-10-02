<?php
    include('db-conn.php');
    include 'css-link.php';

    session_start();
    if (isset($_POST['submit'])) {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM [WorkBook].[dbo].[user] where user_name = '$user_name'";
        $run = sqlsrv_query($con, $sql);
        $row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);
        
        if ($row['password'] == $password) {
            $_SESSION["employee_id"] = $row['employee_id'];
            header('location:index.php');
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Invalid Username or Password <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
            header('location:login.php');
        }
    }
?>