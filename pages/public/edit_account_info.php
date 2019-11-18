<?php
ob_start();
?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/header.php'?>
<?php include $_SERVER['DOCUMENT_ROOT']."/includes/db.inc.php"?>
<?php include $_SERVER['DOCUMENT_ROOT']."/includes/query.inc.php"?>

<div class="jumbotron">
    <form method="post">
        <label for="fn"> First Name </label>
        <input class="form-control" name="fname_inp" id="fn" type="text">
        <label for="ln"> Last Name </label>
        <input class="form-control" name="lname_inp" id="ln" type="text">
        <label for="addr"> Full Address </label>
        <input class="form-control" name="addr_inp" id="addr" type="text">
        <label for="phone"> Phone </label>
        <th> <input class="form-control" name="phone_inp" id="phone" type="text"> </th>
        <button class="btn btn-outline-secondary" name="save_btn" type="submit">Save</button>
        <button class="btn btn-outline-secondary" name="cancel_btn">Cancel</button>
    </form>
    <?php
    $acc_id = $_SESSION['AccountID'];
    $sql = 'SELECT AccountType FROM Account WHERE AccountID =?';
    $stmt = bind_query($conn, $sql, 'i', array($acc_id));
    $acc_type = '';
    mysqli_stmt_bind_result($stmt, $AccountType);
    if (isset($_POST['save_btn'])) {
        if (mysqli_stmt_num_rows($stmt)) {
            while (mysqli_stmt_fetch($stmt)) {
                $acc_type = $AccountType;
            }
            mysqli_stmt_free_result($stmt);
    
            if ($acc_type === 'staff') {
                if (!empty($_POST['fname_inp']) && !empty($_POST['lname_inp']) 
                    && !empty($_POST['addr_inp']) && !empty($_POST['phone_inp'])) {
                    
                    $sql = 'UPDATE Staff SET FullName = ?, Address = ?, Phone = ? WHERE AccountID = ?';
                    $stmt = bind_query($conn, $sql, 'ssii', array($_POST['fname_inp']." ".$_POST['lname_inp'], $_POST['addr_inp'], $_POST['phone_inp'], $acc_id));
                    mysqli_stmt_free_result($stmt);
                    header('Location: ../customer/index.php?success');
                }
                echo "Cannot have blank fields";
            }
            else if ($acc_type === 'customer') {
                if (!empty($_POST['fname_inp']) && !empty($_POST['lname_inp']) 
                    && !empty($_POST['addr_inp']) && !empty($_POST['phone_inp'])) {
                    
                    $sql = 'SELECT * FROM Customer WHERE AccountID = ?';
                    $stmt = bind_query($conn, $sql, 'i', array($acc_id));
                    if (mysqli_stmt_num_rows($stmt)) {
                        $sql = 'UPDATE Customer SET CustomerFirstName = ?, CustomerLastName = ?, CustomerAddress = ?, Phone = ? WHERE AccountID = ?';
                        $stmt = bind_query($conn, $sql, 'sssii', array($_POST['fname_inp'], $_POST['lname_inp'], $_POST['addr_inp'], $_POST['phone_inp'],$acc_id));
                        mysqli_stmt_free_result($stmt);
                        header('Location: ../customer/index.php?success');
                    }
                    else {
                        $sql = 'INSERT INTO Customer(AccountID, CustomerFirstName, CustomerLastName, CustomerAddress, Phone) VALUES (? ? ? ?)';
                        $stmt = bind_query($conn, $sql, 'isssi', array($acc_id, $_POST['fname_inp'], $_POST['lname_inp'], $_POST['addr_inp'], $_POST['phone_inp']));
                        mysqli_stmt_free_result($stmt);
                        header('Location: ../customer/index.php?success');
                    }
                }
                else 
                    echo "Cannot have blank fields";
            }
            mysqli_stmt_close($stmt);
        }
        else
            echo "Account not found";
    }

    if (isset($_POST['cancel_btn'])) {
        header('Location ../members/welcome.php?');
    }
    ?>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'?>
<?php
ob_end_flush();
?>