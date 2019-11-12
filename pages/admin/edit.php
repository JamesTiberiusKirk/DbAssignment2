<?php
ob_start();
?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/header.php'?>

<?php include $_SERVER['DOCUMENT_ROOT']."/includes/db.inc.php"?>


<div class="jumbotron">
    <h2>Editing User <?php echo $_SESSION['uname'];?></h2>

    <!-- <form class="input-group mb-3" method="post">
        
    </form> -->
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
            </tr>
        </thead>
        <form method="post">
            <tr> 
                <th scope="col"> <input class="form-control" name="new_id_inp" type="text">
                <th> <input class="form-control" name="new_usrn_inp" type="text"> </th>
                <th> <input class="form-control" name="new_email_inp" type="text"> </th>
                <th> <input class="form-control" name="new_role_inp" type="text"> </th>
            </tr>
            <button class="btn btn-outline-secondary" name="submit_btn" type="submit">Submit</button>
            <button class="btn btn-outline-secondary" name="cancel_btn">Cancel</button>
        </form>
    </table>


    <?php 
        $submit_btn = $_POST['submit_btn'];
        $cancel_btn = $_POST['cancel_btn'];
        $new_role_inp = $_POST['new_role_inp'];
        $new_id_inp = $_POST['new_id_inp'];
        $new_usrn_inp = $_POST['new_usrn_inp'];
        $new_email_inp = $_POST['new_email_inp'];
        
        $uID = $_SESSION['uID'];

        echo $uID;
        
        if (isset($submit_btn)) {
            if (!empty($new_role_inp)) {
                $sql = 'UPDATE testapp.users SET urole="$new_role_inp" WHERE uID="$uID"';
                $result = $conn->query($sql);
            }
    
            if (!empty($new_id_inp)) {
                $sql = 'UPDATE testapp.users SET uID="$new_id_inp" WHERE uID="$uID"';
                $result = $conn->query($sql);
            }
    
            if (!empty($new_usrn_inp)) {
                $sql = 'UPDATE testapp.users SET uname="$new_usrn_inp" WHERE uID="$uID"';
                $result = $conn->query($sql);
            }
    
            if (!empty($new_email_inp)) {
                $sql = 'UPDATE testapp.users SET uemail="$new_email_inp" WHERE uID="$uID"';
                $result = $conn->query($sql);
            }
            header('Location:  /pages/admin/users.php');
            exit();
        }
        else if (isset($cancel_btn)) {
            header('Location:  /pages/admin/users.php');
            exit();
        }
    ?>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'?>
<?php
ob_end_flush();
?>
