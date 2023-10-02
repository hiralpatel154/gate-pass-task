<?php
include 'db-conn.php';
$dbsql = "SELECT * from [WorkBook].[dbo].[user] where employee_id='" . $_SESSION['employee_id'] . "' ";
$result2 = sqlsrv_query($con, $dbsql);
$dbrow = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC);
?>
<header class="d-flex justify-content-between align-items-center shadow">
    <div class="menu-toggle">
        <label for="sidebar-toggle">
            <span class="bars"><i class="fa-solid fa-bars"></i></span>
        </label>
    </div>
    <div>
        <p class="logged-user">
            <?php echo $dbrow["user_name"] ?>
        </p>
    </div>
</header>