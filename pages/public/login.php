<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php' ?>

<?php
if (isset($_GET['error'])) {
    echo '<script type="text/javascript">alert("' . $_GET['error'] . '");</script>';
}
?>

<div class="jumbotron">
    <div class="row">
        <div class="col"></div>
        <div class="col-sm">
            <form action="/includes/login.inc.php" method="post">
                <h1>Log in</h1>
                <div class="form-group">
                    <label for="uname">User Name</label>
                    <?php
                    if (isset($_GET['uname'])) {
                        echo '<input type="name" name="uname" class="form-control" id="uname" 
                            value="' . $_GET['uname'] . '">';
                    } else {
                        echo '<input type="name" name="uname" class="form-control" id="uname" 
                            placeholder="Username">';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">User Password</label>
                    <input type="password" name="upass" class="form-control" id="upass" placeholder="Password">
                </div>
                <button type="submit" name="login-submit" class="btn btn-primary">Login</button>
            </form>
            <br>
            <form action="./signup.php">
                <button type="submit" class="btn btn-primary">Signup</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php' ?>