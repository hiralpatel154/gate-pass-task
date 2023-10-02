<?php
include 'db-conn.php';
include 'auth_session.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    
}
$query = "SELECT * from employees where sr_no=$id";
$qresult = sqlsrv_query($con, $query);
$row=sqlsrv_fetch_array($qresult, SQLSRV_FETCH_ASSOC);
$filename = $row['file_name'];
unlink("uploads/" . $filename);
$sql = "DELETE FROM employees where sr_no=$id";
$result = sqlsrv_query($con, $sql);


if ($result) {
    header('location:index.php');
} else {
    die(print_r(sqlsrv_errors(), true));
}

?>