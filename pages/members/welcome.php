<?php include "/includes/header.php" ?>
<div class="jumbotron">
    <?php

    if (!isset($_SESSION['uID'])) {
        Location('/index.php');
        exit();
    }

    echo 'Welcome member';
    ?>
</div>
<?php include "/includes/footer.php" ?>