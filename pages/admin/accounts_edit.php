<?php
ob_start();
?>
<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/header.php'?>

<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'."/includes/db.inc.php"?>



<div class="jumbotron">
    <?php
    include_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'."/includes/query.inc.php";
    
    $sql = 'SELECT * FROM Account WHERE AccountID="'.$_GET['edit_btn'].'"';
    $result = mysqli_query($conn, $sql);
    while ($row = $result->fetch_assoc()) {
        echo '<h2>Editing User '.$row['Username'].'</h2>';
    }
    $result->free_result();

    $sql = 'SELECT Username, AccountType FROM Account WHERE AccountID = ?';
    $stmt = bind_query($conn, $sql, 'i' ,array($_GET['edit_btn']));
    mysqli_stmt_bind_result($stmt, $username, $account_type);
    $usrn = '';
    $acc_type = '';
    while($row = mysqli_stmt_fetch($stmt)) {
        $usrn = $username;
        $acc_type = $account_type;
    }
    ?>
    <form method="post">
        <label for="nui"> New Username </label>
        <th> <input class="form-control" name="new_usrn_inp" id="nui" type="text" value="<?php echo $username; ?>"> </th>
        <label for="nri"> New Role </label>
        <th> <input class="form-control" name="new_role_inp" id="nri" type="text" value="<?php echo $account_type; ?>"> </th>
        <button class="btn btn-outline-secondary" name="submit_btn" type="submit">Submit</button>
        <button class="btn btn-outline-secondary" name="cancel_btn">Cancel</button>
    </form>


    <?php
        function _execute_query($sql, $conn, $bind_str, $var1, $var2) {
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql))
                die("dberr:".mysqli_error($conn));
            else {
                mysqli_stmt_bind_param($stmt, $bind_str, $var1, $var2);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_get_result($stmt);

                //mysqli_stmt_free_result($result);
            }
            return $result;
        }

        
        if (isset($_POST['submit_btn'])) {
            $submit_btn = $_POST['submit_btn'];
            $new_role_inp = $_POST['new_role_inp'];
            $new_usrn_inp = $_POST['new_usrn_inp'];
            $result = '';
            if (!empty($new_role_inp)) {
                $sql = 'UPDATE Account SET AccountType=? WHERE AccountID=?';
                $result = _execute_query($sql, $conn, 'si', $new_role_inp, $_GET['edit_btn']);
            }
    
            if (!empty($new_usrn_inp)) {
                $sql = 'UPDATE Account SET Username=? WHERE AccountID=?';
                $result = _execute_query($sql, $conn, 'si', $new_usrn_inp, $_GET['edit_btn']);
            }
            header('Location:/2019-ac32006/team2/pages/admin/users.php');  
        }
        
        if (isset($_POST['cancel_btn'])) {
            header("Location:/2019-ac32006/team2/pages/admin/users.php?");
            exit();
        }
    ?>
</div>

<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/footer.php'?>
<?php
ob_end_flush();
?>