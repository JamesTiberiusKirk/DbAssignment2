<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/header.php' ?>

<div class="jumbotron">
    <?php

    if(isset($_SESSION['uID'])){
        echo "<br>Logged in<br>";
    } else {
        echo "<br>Logged out<br>";
    }

    ?>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php' ?>
