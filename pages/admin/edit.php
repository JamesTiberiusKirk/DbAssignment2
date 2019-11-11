<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/header.php'?>

<?php include $_SERVER['DOCUMENT_ROOT']."/includes/db.inc.php"?>

<div class="jumbotron">
    <?php 
    session_start()
    ?>
    <h2>Editing User <?php echo $_SESSION['uname']?></h2>
    <form class="input-group mb-3" method="post">
        <input class="form-control" name="new_role_inp" type="text" placeholder="Enter new role" method="post">
        <button class="btn btn-outline-secondary" name="submit_btn" type="submit">Submit</button>
        <button class="btn btn-outline-secondary" name="cancel_btn">Cancel</button>
    </form>

    <!-- <form class="input-group mb-3" method="post">
        
    </form> -->

    <?php 
        $submit_btn = $_POST['submit_btn'];
        $cancel_btn = $_POST['cancel_btn'];
        $new_role_inp = $_POST['new_role_inp'];
        
        $uID = $_SESSION['uID'];
        if (!empty($new_role_inp)) {
            $sql = "UPDATE $name_db.users SET urole='$new_role_inp' WHERE uID='$uID'";
            $result = $conn->query($sql);
            if ($result === TRUE) {
                echo $new_role_inp;
            }
            else
                echo "Update unsuccessfull";
        }
    ?>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'?>