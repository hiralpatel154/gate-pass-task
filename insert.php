<?php
include 'db-conn.php';
include 'auth_session.php';

if (isset($_POST['submit'])) {
    $visitor_id = $_POST['visitor_id'];
    $date_field = $_POST['date_field'];
    $time_field = $_POST['time_field'];
    $mobile = $_POST['mobile'];
    $name = $_POST['name'];
    $details = $_POST['details'];
    $company = $_POST['company'];
    $address = $_POST['address'];
    $person = $_POST['person'];
    $officer = $_POST['officer'];

    if ($_FILES["file_name"] != '') {
        $file = $_FILES["file_name"]["name"];
        $fileExt = substr($file, strripos($file, '.')); // get file extention
        $filename = $visitor_id. $fileExt;
        move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/" . $filename);
    } else {
        $filename = '';
    }

    $sql = "INSERT INTO employees(visitor_id,file_name, date_field, time_field,mobile,name,
            details,company,address,person,officer) VALUES('$visitor_id','$filename','$date_field','$time_field',
            '$mobile','$name','$details','$company','$address','$person','$officer')";
    $result = sqlsrv_query($con, $sql);

    if ($result) {
        header('Location: index.php');
    } else {
        die(print_r(sqlsrv_errors(), true));
    }
}
?>