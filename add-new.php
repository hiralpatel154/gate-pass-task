<?php
include 'db-conn.php';
include 'auth_session.php';
include 'css-link.php';
include 'header.php';
include 'sidebar.php';
include 'footer.php';

$sql = "SELECT max(visitor_id) as vid from employees";
$result = sqlsrv_query($con, $sql);
$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

if(empty($row['vid'])){
    $row['vid'] = '100';
}
?>
<div class="add-new-edit">
    <main>
        <div class="page-header">
            <h4 class="text-center m-3">Add New Gate Pass</h4>
        </div>
        <form method="post" action="insert.php" enctype="multipart/form-data">
            <div class="add-form">
                <div class="row mb-3">
                    <div class="col-md-1">
                        <label for="">Visitor ID</label>
                        <input type="text" id="visitorid" name="visitor_id" class="form-control"
                            value="<?php echo $row['vid'] + 1 ?>" readonly="">

                    </div>
                    <div class="col-md-3">
                        <label for="">Image</label>
                        <input type="file" name="file_name" id="" class="file-css form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="">Date</label><br>
                        <input type="date" name="date_field" id="" class="form-control" min="<?php echo date("Y-m-d"); ?>" max="<?php echo date("Y-m-d");?>" value="<?php echo date('Y-m-d');?>" required>
                    </div>
                    <div class="col-md-2">
                        <label for="">Time</label><br>
                        <input type="time" name="time_field" id="" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label for="">Mobile Number</label><br>
                        <input type="text" name="mobile" id="" placeholder="Enter mobile Number" class="form-control"
                            required>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-4">
                        <label for="">Name</label><br>
                        <input type="text" name="name" id="" placeholder="Enter Visitor's Name" class="form-control"
                            required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Details</label><br>
                        <input type="text" name="details" id="" placeholder="Enter Visitor's Details"
                            class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Company Name</label><br>
                        <input type="text" name="company" id="" placeholder="Enter Company Name" class="form-control"
                            required>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-4">
                        <label for="">Address</label><br>
                        <input type="text" name="address" id="" placeholder="Enter Address" class="form-control"
                            required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Person to meet</label><br>
                        <input type="text" name="person" id="" placeholder="Enter Person to meet" class="form-control"
                            required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Time Officer Name</label><br>
                        <input type="text" name="officer" id="" placeholder="Enter  officer's Name" class="form-control"
                            required>
                    </div>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                    <input type="submit" name="submit" id="" class="btn btn-success submit" placeholder="Submit">
                    <a href="index.php"
                        class="btn btn-danger text-white back mx-2 d-flex align-items-center justify-content-center">Back</a>
                </div>
            </div>
        </form>
    </main>
</div>
<?php
include('footer.php');
?>