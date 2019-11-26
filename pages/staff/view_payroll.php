<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/header.php' ?>
<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/db.inc.php' ?>
<div class="jumbotron">

<?php 
include_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/query.inc.php';
$sql = 'SELECT StaffID FROM Staff WHERE AccountID = ?';
$stmt = bind_query($conn, $sql, 'i', array($_SESSION['AccountID']));
mysqli_stmt_bind_result($stmt, $staffid);

$staff_id = '';
while(mysqli_stmt_fetch($stmt)) {
    $staff_id = $staffid;
}
mysqli_stmt_free_result($stmt);
?>

<?php
echo '<h2>Staff ID: '.$staff_id.'</h2>';
?>
    <table class="table">
            <?php
                $sql = 'SELECT * FROM Payroll WHERE StaffID="'.$staff_id.'"';
                $result = mysqli_query($conn, $sql);
                while ($row = $result->fetch_assoc()) {
                    echo'<tr>    
                            <th>Full Name</th>
                            <th>'.$row['FullName'].'
                        </tr>
                        <tr>    
                            <th>Payroll ID</th>
                            <th>'.$row['PayrollID'].'
                        </tr>
                        <tr>    
                            <th>Deductions</th>
                            <th>'.$row['Deductions'].'
                        </tr>
                        <tr>    
                            <th>Gross Pay</th>
                            <th>'.$row['GrossPay'].'
                        </tr>
                        <tr>    
                            <th>Net Pay</th>
                            <th>'.$row['NetPay'].'
                        </tr>
                        <tr>    
                            <th>NI</th>
                            <th>'.$row['Ni'].'
                        </tr>';
                }
            
            ?>
    </table>
</div>

<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/footer.php' ?>