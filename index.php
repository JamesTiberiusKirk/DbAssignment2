<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'. '/includes/header.php'?>

<div class="jumbotron">
    <?php

    if(isset($_SESSION['AccountID'])){
        echo "<br>Logged in<br>";
    } else {
        echo "<br>Logged out<br>";
    }

    ?>
</div>

<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/footer.php' ?>
