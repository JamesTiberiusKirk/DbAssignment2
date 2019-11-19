<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/header.php' ?>
<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/db.inc.php' ?>
<div class="jumbotron">
<?php
//include_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/query.inc.php';
$sql = 'SELECT * FROM StaffInformation WHERE AccountID="'.$_SESSION['AccountID'].'"';
$result = mysqli_query($conn, $sql);
$staff_id = '';
while ($row = $result->fetch_assoc()) {
    $staff_id = $row['StaffID'];
}
echo '<h2>Staff ID: '.$staff_id.'</h2>';
?>
    <table class="table">
            <?php
                $sql = 'SELECT * FROM StaffInformation WHERE AccountID="'.$_SESSION['AccountID'].'"';
                $result = mysqli_query($conn, $sql);
                while ($row = $result->fetch_assoc()) {
                    echo'<tr>    
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