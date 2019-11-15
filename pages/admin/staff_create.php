<?php ob_start()?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/header.php'?>

<?php include $_SERVER['DOCUMENT_ROOT']."/includes/db.inc.php"?>

<div class="jumbotron">
    <form method="post">
        <label for="fni">Full name</label>
        <input class="form-control" id="fni" name="full_name_inp" type="text">
        <label for="aci">Account ID</label>
        <input class="form-control" id="aci" name="acc_id_inp" type="text">
        <label for="jti">Job Title</label>
        <input class="form-control" id="jti" name="job_title_inp" type="text">
        <label for="bii">Branch ID</label>
        <select class="mdb-select md-form" name='branch_id_inp' id='bii'>
            <option value="" >Choose branch ID</option>
                <?php
                $sql = 'SELECT * FROM Branch';
                $result = mysqli_query($conn, $sql);
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="'.$row['BranchID'].'">'.$row['BranchID'].'</option>';
                }
                mysqli_free_result($result);
                ?>
        </select>
        <button class="btn btn-primary" name="add_staff_btn" type="submit">Add</button>
        <button class="btn btn-secondary" name="cancel_btn">Cancel</button>
    </form>

    <?php
    //mysqli_next_result($conn);
    if (isset($_POST['add_staff_btn'])) {
        if (!empty($_POST['full_name_inp']) && !empty($_POST['acc_id_inp']) 
            && !empty($_POST['branch_id_inp']) && !empty($_POST['job_title_inp'])) {
            
            $sql = 'SELECT * FROM Account WHERE AccountID="'.$_POST['acc_id_inp'].'"';
            $result = mysqli_query($conn, $sql) or die("dberr:".mysqli_error());
            $acc_type = '';
            if ($result->num_rows) {
                while ($row = $result->fetch_assoc()) {
                    $acc_type = $row['AccountType'];
                }
    
                if ($acc_type === 'staff') {
                    mysqli_free_result($result);
                    $sql = 'INSERT INTO Staff (FullName, AccountID, BranchID, Role)
                                    VALUES (?, ?, ?, ?)';
    
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        die("dberr:".mysqli_error($conn));
                    }
                    else {
                        mysqli_stmt_bind_param($stmt, 'siis', $_POST['full_name_inp'], $_POST['acc_id_inp'],
                            $_POST['branch_id_inp'], $_POST['job_title_inp']);
                        mysqli_stmt_execute($stmt) or die("dberr:".mysqli_error($conn));
                        mysqli_stmt_store_result($stmt);
                        mysqli_stmt_get_result($stmt);
                        mysqli_stmt_free_result($stmt);    
                        mysqli_stmt_close($stmt);
                    
    
                        header('Location: /pages/admin/staff_manager.php?success');
                    }
                }
                else
                    header('Location: /pages/admin/staff_create.php?error=user%not%staff');
            }
            else
                header('Location: /pages/admin/staff_create.php?error=no%such%user');  
        }
    }

    if(isset($_POST['cancel_btn'])) {
        header('Location: /pages/admin/staff_manager.php?canceled%staff%create');
    }
    ?>
</div>

<?php ob_end_flush()?>


<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'?>