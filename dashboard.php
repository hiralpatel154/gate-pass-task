<?php
include 'db-conn.php';
include 'auth_session.php';
include 'css-link.php';
include 'sidebar.php';
include 'header.php';

$sql = "SELECT count(*) as v_count FROM employees";
$result = sqlsrv_query($con, $sql);
$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

$dsql = "SELECT count(*) as vd_count FROM employees WHERE date_field = '".date('Y-m-d')."'";
$dresult = sqlsrv_query($con, $dsql);
$drow = sqlsrv_fetch_array($dresult, SQLSRV_FETCH_ASSOC);



?>
<div class="main-content">
    <h3 class="text-center mt-5">Dashboard</h3>

    <div class="visitors-box mx-4 mt-4 d-flex justify-content-center align-items-center">
        <div class="card visitor-card w-100 me-4">

            <div class="card-body d-flex flex-column justify-content-center">
                <div class="row">
                    <div
                        class="col-md-5 col-sm-6 col-6 visitors current-visitors d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-user-group visitor"></i>

                    </div>
                    <div class="col-md-7 col-sm-6 col-6 px-0 d-flex flex-column justify-content-center">
                        <div class="visitor-count">
                            <p class="today-visitors"><?php echo $drow['vd_count']?></p>
                            <p class="visitor-text">Today's Visitors</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card visitor-card w-100">
            <div class="card-body d-flex flex-column justify-content-center">
                <div class="row">
                    <div
                        class="col-md-5 col-sm-6 col-6 visitors total-visitors d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-users total-visitor"></i>
                    </div>
                    <div class="col-md-7 col-sm-6 col-6 px-0 d-flex flex-column justify-content-center">
                        <div class="visitor-count">
                            <p class="today-visitors">
                                <?php echo $row['v_count'] ?>
                            </p>
                            <p class="visitor-text">Total Visitors till date
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>