<?php
ob_start();
?>
<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2' . '/includes/header.php' ?>
<?php include_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/db.inc.php'?>
<?php include_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/query.inc.php'?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    
<div class="jumbotron">
    <h3> Scheduling Staff ID: <?php echo '<b> '.$_GET['schedule_btn'].'</b>'; $staff_id = $_GET['schedule_btn'];?></h3>
    <form method="post">
        <label for="schdl_date">Date</label>
        <input placeholder="Schedule Date" type="text" name="schdl_date_inp" id="schdl_date" class="form-control datepicker" >
        <label for="schdl_time">Start Time</label>
        <input placeholder="Schedule Time" type="text" name="schdl_ts_inp"id="schdl_time_start" class="form-control timepicker" >
        <label for="schdl_time">End Time</label> 
        <input placeholder="Schedule Time" type="text" name="schdl_te_inp" id="schdl_time_end" class="form-control timepicker" >
        
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
    $date = date_create($_POST['schdl_date_inp']);
    $sql = 'INSERT INTO StaffSchedule(StaffID, Date, Start_at, Finish_at) VALUES (?, ?, ? ,?)';

    if (isset($_POST['schdl_submit'])) {
        if (!empty($_POST['schdl_date_inp']) && !empty($_POST['schdl_ts_inp']) && !empty($_POST['schdl_te_inp'])) {
            $stmt = bind_query($conn, $sql, 'isss', array($staff_id, date_format($date, 'y-m-d'), 
                $_POST['schdl_ts_inp'], $_POST['schdl_te_inp']));
                
            mysqli_stmt_free_result($stmt);
            mysqli_stmt_close($stmt);
            header('Location:/2019-ac32006/team2/pages/admin/staff_manager.php?schedule%successful');
            exit();         
        }
        else {
            header('Location:/2019-ac32006/team2/pages/admin/staff_manager.php?schedule%unsuccessful');
            exit();
        }
    }

    if (isset($_POST['schdl_cancel'])) {
        header('Location:/2019-ac32006/team2/pages/admin/staff_manager.php');
    }
    ?>
</div>

<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2' . '/includes/footer.php' ?>
<?php
ob_end_flush();
?>