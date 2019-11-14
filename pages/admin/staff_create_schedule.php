<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php'?>

<div class="jumbotron">
    <h3> Scheduling Staff ID: <?php echo '<b> '.$_GET['schedule_btn'].'</b>'?></h3>
    <div class="container">
          <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#datetimepicker1').datetimepicker();
                });
            </script>
          </div>
       </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php' ?>