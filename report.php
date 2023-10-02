<?php
include 'auth_session.php';
include 'css-link.php';
include 'sidebar.php';
include 'header.php';
?>
<div class="main-content">
    <div class="d-flex mx-4">
        <h3 class="text-left mt-4 report w-50">Report</h3>
        <div class="text-right mt-4 w-50 d-flex flex-column justify-content-center form-report">
            <div class="row">
                <div class="col-md-4">
                    <input type="date" name="date_field" id="date-input" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <button type="button" id="Search" class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- View the Employee Table -->
    <div class="table-box" id="putData">
        
    </div>
</div>
<script>
    $(document).on('click','#Search',function(){
        var date = $('#date-input').val();
        $.ajax({
            url: 'report_get.php',
            type: 'post',
            data: {date:date},
            success:function(data){
                $('#putData').html(data);
            }
        });
    });
    $(document).ready(function () {
        $('#reportData').DataTable({
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