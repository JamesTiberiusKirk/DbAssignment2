<?php
ob_start();
?>
<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2' . '/includes/header.php' ?>
<?php include_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/db.inc.php'?>

<div class="jumbotron">
    <?php

    $sql = 'SELECT * FROM Account WHERE AccountID="'.$_SESSION['AccountID'].'"';
    $result = mysqli_query($conn, $sql);
    $acc_type = '';
    while ($row = $result->fetch_assoc()) {
        $acc_type = $row['AccountType'];
    }
    ?>
    <h2>Account Information</h2>
    <table class="table">
            <?php
            if ($acc_type === 'customer') {
                $sql = 'SELECT * FROM Customer WHERE AccountID ="'.$_SESSION['AccountID'].'"';
                $result = mysqli_query($conn, $sql);
                $result_arr = array(); 
                while($row = $result->fetch_assoc()) {
                   $result_arr[0] = $row["CustomerFirstName"];
                   $result_arr[1] = $row["CustomerLastName"];
                   $result_arr[2] = $row["CustomerAddress"];
                   $result_arr[3] = $row["Phone"];
                }
            }
            else if ($acc_type === 'staff') {
                $sql = 'SELECT * FROM Staff WHERE AccountID ="'.$_SESSION['AccountID'].'"';
                $result = mysqli_query($conn, $sql);
                $result_arr = array(); 
                echo mysqli_error($conn);
                while($row = $result->fetch_assoc()) {
                   $result_arr[0] = $row["FullName"];
                   $result_arr[1] = $row["Address"];
                   $result_arr[2] = $row["Phone"];
                }
            }
            
            if ($acc_type === 'customer') {
                echo ' <tr>
                <th>First Name: </th>
                <td>'.$result_arr[0].'</td>
                </tr>    
                <tr>
                    <th>Last Name: </th>
                    <td>'.$result_arr[1].'</td>
                </tr>
                <tr>
                    <th>Address: </th>
                    <td>'.$result_arr[2].'</td>
                </tr>
                <tr>
                    <th>Phone: </th>
                    <td>'.$result_arr[3].'</td>
                </tr>';
            }
            else if($acc_type === 'staff') {
                echo ' <tr>
                <th>Full Name: </th>
                <td>'.$result_arr[0].'</td>
                </tr>    
                <tr>
                    <th>Address: </th>
                    <td>'.$result_arr[1].'</td>
                </tr>
                <tr>
                    <th>Phone: </th>
                    <td>'.$result_arr[2].'</td>
                </tr>';
            }
            ?>
    </table>
    <?php
    
    ?>
</div>

<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/footer.php'?>
<?php
ob_end_flush();
?>