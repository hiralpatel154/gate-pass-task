<?php
include 'db-conn.php';
$sql = "SELECT * from employees";
$run = sqlsrv_query($con, $sql);
?>

<div class="main-content">
    <main>
        <div class="page-header d-flex justify-content-between align-items-center">
            <div>
                <h3>Gate Pass</h3>
            </div>
            <!-- <input type="text" name="Search Here" id="main-search" placeholder="Search Here" class="form-control w-25"> -->
            <div>
                <a href="add-new.php" class="add-new rounded-pill"><i class="fa-solid fa-user-plus"></i>Add New</a>
            </div>
        </div>
        <!-- View the Employee Table -->
        <div class="table-box" id="search-table">
            <table class="table align-middle" id="gate-data">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Visitor ID</th>
                        <th>Image</th>
                        <th>Date</th>
                        <th>Intime</th>
                        <th>Mobile No.</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th>Company Name</th>
                        <th>Address</th>
                        <th>Person to meet</th>
                        <th>Time officer name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sr = 1;
                    while ($row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $sr ?>
                            </td>
                            <td>
                                <?php echo $row['visitor_id'] ?>
                            </td>
                            <td><img src='uploads/<?php echo $row['file_name'] ?>' alt="image" srcset="" class="user-image">
                            </td>
                            <td style="white-space:nowrap;">
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
                        <?php $sr++;
                    }
                    ?>

                </tbody>
            </table>

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
    $(document).ready(function () {
        $('#gate-data').DataTable({
            "processing": true,
            "lengthMenu": [5, 10, 25, 50, 75, 100],
            "responsive": {
                "details": true
            },

            dom: 'Bfrtip',
            buttons: ['pageLength', 'excel'],
            language: {
                searchPlaceholder: "Search..."
            }
        });
    });
</script>