<?php include "/includes/header.php" ?>

<div class="jumbotron">
    <?php

    if(isset($_SESSION['uID'])){
        echo "<br>Logged in<br>";
    } else {
        echo "<br>Logged out<br>";
    }

    ?>
</div>

<?php include "/includes/footer.php" ?>
