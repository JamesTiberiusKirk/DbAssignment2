<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/header.php' ?>
<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/db.inc.php' ?>
<div class="jumbotron">
<?php
$sql = 'SELECT * FROM Staff WHERE AccountID="'.$_SESSION['AccountID'].'"';
$result = mysqli_query($conn, $sql);
$staff_id = '';
$branch_id = '';
while ($row = $result->fetch_assoc()) {
    $staff_id = $row['StaffID'];
    $branch_id = $row['BranchID'];
}
echo '<h2>Staff ID: '.$staff_id.'</h2>';
mysqli_free_result($result);
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
        <?php
        $sql = 'SELECT * FROM StaffSchedule WHERE StaffID="'.$staff_id.'"';
        $result = mysqli_query($conn, $sql);
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<th scope="col">'.$row['Date'].'</td>';
            echo '<td>'.$row['Start_at'].'</td>';
            echo '<td>'.$row['Finish_at'].'</td>';
            echo '<td>'.$branch_id.'</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>

<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/footer.php' ?>
