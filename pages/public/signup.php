<?php include "/includes/header.php" ?>

<div class="jumbotron">
    <div class="row">
        <div class="col"></div>
        <div class="col-sm">
            <form action="/includes/signup.inc.php" method="post">
                <h1>Sign up</h1>
                <div class="form-group">
                    <label for="uname">User Name</label>
                    <input type="name" name="uname" class="form-control" id="uname" 
                        placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="uemail">User Email</label>
                    <input type="email" name="uemail" class="form-control" id="uemail" 
                        placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="upass">New User Password</label>
                    <input type="password" name="upass" class="form-control" 
                        id="upass" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="repeatupass">Repeat User Password</label>
                    <input type="password" name="repeatupass" class="form-control" 
                        id="repeatupass" placeholder="Repeat Password">
                </div>

                <button type="submit" name="signup-submit" class="btn btn-primary">Sign up</button>
            </form>
            <br>
        </div>
        <div class="col"></div>
    </div>
</div>

<?php include "/includes/footer.php" ?>
