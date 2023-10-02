<?php
include 'db-conn.php';
include 'auth_session.php';
include 'css-link.php';
include 'header.php';
include 'sidebar.php';
include 'footer.php';

if (isset($_GET['editid'])) {
    $id = $_GET['editid'];
}

$sql = "SELECT * from employees where sr_no=$id";
$result = sqlsrv_query($con, $sql);
$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

?>

<div class="add-new-edit">
    <main>
        <div class="page-header">
            <h4 class="text-center m-3">Edit Gate Pass</h4>
        </div>
        <form method="post" action="update.php" enctype="multipart/form-data">
            <div class="add-form">
                <input type="hidden" name="sr_no" value="<?php echo $row['sr_no'] ?>">
                <input type="hidden" name="visitor_id" value="<?php echo $row['visitor_id'] ?>">
                <div class="row mb-3">

                    <div class="col-md-4">
                        <label for="">Image</label>
                        <div class="d-flex align-items-center">
                            <input type="file" name="file_name" id="" class="file-css form-control">
                            <input type="hidden" name="old_file_name" value="<?php echo $row['file_name'] ?>">
                            <img src="<?php echo "uploads/" . $row['file_name'] ?>" alt="" srcset="" width="40px" ;>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <label for="">Date</label><br>
                        <input type="date" name="date_field" id="" class="form-control"
                            value="<?php echo $row['date_field']->format('Y-m-d'); ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="">Time</label><br>
                        <input type="time" name="time_field" id="" class="form-control"
                            value="<?php echo $row['time_field']->format('H:i:s') ?>">
                    </div>

                </div>
                <div class="row my-3">
                    <div class="col-md-3">
                        <label for="">Name</label><br>
                        <input type="text" name="name" id="" class="form-control" value="<?php echo $row['name'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="">Details</label><br>
                        <input type="text" name="details" id="" class="form-control"
                            value="<?php echo $row['details'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="">Company Name</label><br>
                        <input type="text" name="company" id="" class="form-control"
                            value="<?php echo $row['company'] ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="">Mobile Number</label><br>
                        <input type="text" name="mobile" id="" class="form-control"
                            value="<?php echo $row['mobile'] ?>">
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-4">
                        <label for="">Address</label><br>
                        <input type="text" name="address" id="" class="form-control"
                            value="<?php echo $row['address'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="">Person to meet</label><br>
                        <input type="text" name="person" id="" class="form-control"
                            value="<?php echo $row['person'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="">Time Officer Name</label><br>
                        <input type="text" name="officer" id="" class="form-control"
                            value="<?php echo $row['officer'] ?>">
                    </div>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                    <input type="submit" name="submit" id="" class="btn btn-success submit">
                    <a href="index.php"
                        class="btn btn-danger text-white back mx-2 d-flex align-items-center justify-content-center">Back</a>
                </div>
            </div>
        </form>
    </main>
</div>