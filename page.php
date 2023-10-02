<?php
include 'db-conn.php';
$per_page = 5;
$start = 0;
$current_page = 1;
if (isset($_GET['start'])) {
    $start = $_GET['start'];
    if ($start <= 0) {
        $start = 0;
        $current_page = 1;
    } else {
        $current_page = $start;
        $start--;
        $start = $start * $per_page;
    }
}

$sql = "SELECT * from employees limit $start,$per_page";
$run = sqlsrv_query($con, $sql);
$row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);
$params = array();
$options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
$result = sqlsrv_query($con, $sql, $params, $options);
$record = sqlsrv_num_rows($result);
$total_page = ceil($record / $per_page);



?>

<div class="main-content">
    <main>
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h3 class="mt-4">Gate Pass</h3>
            </div>
            <input type="text" name="Search Here" id="main-search" placeholder="Search Here" class="form-control w-25">
            <div>
                <a href="add-new.php" class="add-new rounded-pill"><i class="fa-solid fa-user-plus"></i>Add New</a>
            </div>
        </div>
        <!-- View the Employee Table -->
        <div class="table-box" id="search-table">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>Visitor ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Date</th>
                        <th scope="col">Intime</th>
                        <th scope="col">Mobile No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Details</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Person to <br>meet</th>
                        <th scope="col">Time <br>officer <br> name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['visitor_id'] ?>
                            </td>
                            <td><img src='uploads/<?php echo $row['file_name'] ?>' alt="image" srcset="" class="user-image">
                            </td>
                            <td>
                                <?php echo $row['date_field']->format('d-m-Y') ?>
                            </td>
                            <td>
                                <?php echo $row['time_field']->format('H:i:s') ?>
                            </td>
                            <td>
                                <?php echo $row['mobile'] ?>
                            </td>
                            <td>
                                <?php echo $row['name'] ?>
                            </td>
                            <td>
                                <?php echo $row['details'] ?>
                            </td>
                            <td>
                                <?php echo $row['company'] ?>
                            </td>
                            <td>
                                <?php echo $row['address'] ?>
                            </td>
                            <td>
                                <?php echo $row['person'] ?>
                            </td>
                            <td>
                                <?php echo $row['officer'] ?>
                            </td>
                            <td class="action">
                                <div class="action-box d-flex">
                                    <a href="edit.php?editid=<?php echo $row['sr_no'] ?>"
                                        class="btn btn-primary rounded-pill">Edit</a>
                                    <a href="delete.php?deleteid=<?php echo $row['sr_no'] ?>"
                                        class="btn btn-danger rounded-pill"
                                        onclick="return confirm('Are you sure?')">Delete</a>
                                    <a href="#" class="btn btn-warning rounded-pill">Pdf</a>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
            <div class="pagination-box">
                <?php
                for ($i = 1; $i <= $total_page; $i++) {

                    ?>
                    <?php echo "<a href='index.php?page=" . $i . "'>" . $i . "</a>"; ?>
                <?php } ?>
            </div>
        </div>

    </main>


</div>
<script>
    $(document).on('keyup', '#main-search', function () {
        var search = $('#main-search').val();
        $.ajax({
            url: 'search_get.php',
            type: 'post',
            data: { search },
            success: function (data) {
                $('#search-table').html(data);
            }
        });
    });
</script>