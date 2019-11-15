<?php
ob_start();
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php'?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    
<div class="jumbotron">
    <h3> Scheduling Staff ID: <?php echo '<b> '.$_GET['schedule_btn'].'</b>'?></h3>
    <form method="post">
        <label for="schdl_date">Date</label>
        <input placeholder="Schedule Date" type="text" name="schdl_date_inp" id="schdl_date" class="form-control datepicker">
        <label for="schdl_time">Start Time</label>
        <input placeholder="Schedule Time" type="text" name="schdl_ts_inp"id="schdl_time_start" class="form-control timepicker">
        <label for="schdl_time">End Time</label> 
        <input placeholder="Schedule Time" type="text" name="schdl_te_inp" id="schdl_time_end" class="form-control timepicker">
        
        <script type="text/javascript">
            $("#schdl_date").datepicker({
                uiLibrary: 'bootstrap4',
            });
            $("#schdl_time_start").timepicker({
                uiLibrary: 'bootstrap4'
            });
            $("#schdl_time_end").timepicker({
                uiLibrary: 'bootstrap4'
            });
        </script>
        <button class="btn btn-outline-primary" name="schdl_submit">Schedule</button>
        <button class="btn btn-outline-danger" name="schdl_cancel">Cancel</button>
    </form>
    <?php
    $sql = 'INSERT INTO StaffSchedule(StaffID, Date, Start_at, Finish_at) VALUES (?, ?, ? ,?)';
    $stmt = mysqli_stmt_init($conn);
    echo $_POST['schdl_date_inp'];
    if (isset($_POST['schdl_submit'])) {
        if (!empty($_POST['schdl_date_inp']) && !empty($_POST['schdl_ts_inp']) && !empty($_POST['schdl_te_inp'])) {
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                die("dberr:".mysqli_error($conn));
            }
            else {
                mysqli_stmt_bind_param($stmt, 'isss' ,$_GET['schedule_btn'], $_POST['schdl_date_inp'], 
                $_POST['schdl_ts_inp'], $_POST['schdl_te_inp']);
                mysqli_stmt_execute($stmt) or die("dberr:".mysqli_stmt_error($stmt));
                mysqli_store_result($conn);
                mysqli_stmt_close($stmt);
                //header('Location: /pages/admin/staff_manager.php?schedule%success');
            }            
        }
        // else {
        //     header('Location: /pages/admin/staff_manager.php?schedule%unsuccessful');
        // }
    }
    ?>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php' ?>
<?php
ob_end_flush();
?>