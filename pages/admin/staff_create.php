<?php ob_start()?>
<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/header.php'?>

<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'."/includes/db.inc.php"?>
<?php include_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/query.inc.php'?>
<div class="jumbotron">
    <form method="post">
        <label for="fni">Full name</label>
        <input class="form-control" id="fni" name="full_name_inp" type="text">
        <label for="aci">Account ID</label>
        <input class="form-control" id="aci" name="acc_id_inp" type="text">
        <label for="jti">Job Title</label>
        <input class="form-control" id="jti" name="job_title_inp" type="text">
        <label for="si">Salary</label>
        <input class="form-control" id="jti" name="salary_inp" type="text">
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
            
            $sql = 'SELECT AccountType FROM Account WHERE AccountID=?';
            $acc_type = '';
            $stmt = bind_query($conn, $sql, 'i', array($_POST['acc_id_inp']));
            mysqli_stmt_bind_result($stmt, $AccountType);

            if (mysqli_stmt_num_rows($stmt) == 1) {
                while (mysqli_stmt_fetch($stmt)) {
                    $acc_type = $AccountType;
                }
                mysqli_stmt_free_result($stmt);
                mysqli_stmt_close($stmt);

                if ($acc_type === 'customer') {
                    $sql = 'UPDATE Account SET AccountType="staff" WHERE AccountID=?';
                    $stmt = bind_query($conn, $sql, 'i', array($_POST['acc_id_inp']));
                    mysqli_stmt_free_result($stmt);
                    mysqli_stmt_close($stmt);
                    create_staff($conn);
                    //create_payroll($conn);
                    header('Location:/2019-ac32006/team2/pages/admin/staff_manager.php?success');
                }
                else if ($acc_type === 'staff') {
                    $sql = 'SELECT * FROM Staff WHERE AccountID=?';
                    $stmt = bind_query($conn, $sql, 'i', array($_POST['acc_id_inp']));
                    if (mysqli_stmt_num_rows($stmt) === 0) {
                        mysqli_stmt_free_result($stmt);
                        mysqli_stmt_close($stmt);
                        create_staff($conn);
                        //create_payroll($conn);
                        header('Location:/2019-ac32006/team2/pages/admin/staff_manager.php?success');
                    }
                    else
                        echo "account is already a staff";
                }
                else {
                    echo "Account is not a staff";
                }
                    
            }
            else
                header('Location:/2019-ac32006/team2/pages/admin/staff_create.php?error=no%such%user');  
        }
    }

    if(isset($_POST['cancel_btn'])) {
        header('Location:/2019-ac32006/team2/pages/admin/staff_manager.php?canceled%staff%create');
    }

    function create_staff($conn) {
        $sql = 'INSERT INTO Staff (FullName, AccountID, BranchID, Role, Salary)
        VALUES (?, ?, ?, ?, ?)';
        $stmt = bind_query($conn, $sql, 'siisd', array($_POST['full_name_inp'], $_POST['acc_id_inp'],
            $_POST['branch_id_inp'], $_POST['job_title_inp'], $_POST['salary_inp']));

        mysqli_stmt_free_result($stmt);
        mysqli_stmt_close($stmt);
    }

    // function create_payroll($conn) {
    //     $sql = 'SELECT FROM Staff WHERE AccountID = "'.$_POST['acc_id_inp'].'"';
    //     $result = mysqli_query($conn, $sql);
    //     $staff_id = 0;
    //     if ($result->num_rows) {
    //         while ($row = $result->fetch_assoc()) {
    //             $staff_id = $row['staff_id'];
    //         }
    //     }

    //     $sql = 'INSERT INTO Payroll (FullName, StaffID) VALUES (?, ?)';
    //     $stmt = bind_query($conn, $sql, 'si', array($_POST['full_name_inp'], $staff_id));
    //     mysqli_stmt_free_result($stmt);
    //     mysqli_stmt_close($stmt);
    // }
    ?>
</div>

<?php ob_end_flush()?>
<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/footer.php'?>