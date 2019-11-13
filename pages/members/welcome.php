<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/header.php' ?>
<div class="jumbotron">
    <?php

    if (!isset($_SESSION['AccountID'])) {
        Location('/index.php');
        exit();
    }

    echo 'Welcome member';
    ?>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php' ?>
