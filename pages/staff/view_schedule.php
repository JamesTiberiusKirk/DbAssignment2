<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/header.php' ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php' ?>
<div class="jumbotron">
<?php 
echo '<h2>Staff ID: '.$_SESSION['uID'].'</h2>';
?>
<table class="table">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Time Start</th>
                <th scope="col">Time End</th>
                <th scope="col">Branch</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php' ?>
