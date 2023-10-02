<?php
include 'db-conn.php';
include 'auth_session.php';

if (isset($_POST['submit'])) {
    $sr_no = $_POST['sr_no'];
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
    $new_image = $_FILES['file_name']['name'];
    $old_image = $_POST['old_file_name'];

   
    if ($new_image != '') {
        $fileExt = substr($new_image, strripos($new_image, '.')); // get file extention
        $filename = $visitor_id. $fileExt;
        move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/" . $filename);
    } else {
        $filename = $old_image;
    }
    
    $sql = "UPDATE employees SET date_field='$date_field', time_field='$time_field',mobile = '$mobile',name='$name',details='$details',company='$company',address='$address',person='$person',officer='$officer',file_name='$filename' where sr_no = '$sr_no'";
    $result = sqlsrv_query($con, $sql);

    if ($result) {
        header('Location:index.php');
    } else {
        die(print_r(sqlsrv_errors(), true));
    }
}


?>