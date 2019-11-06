<?php include "./includes/header.php" ?>

<div class="jumbotron">
    <?php
    include_once("./includes/db.inc.php");
    echo "<br>Connected successfully<br>";

    $sql = "SELECT uID, uname, upass FROM testapp.users";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["uID"] . " - username: " . $row["uname"];
            echo " - password: ". $row["upass"] . "<br>";
        }
    } else {
        echo "0 results";
    }
    
    $conn->close();
    ?>
</div>

<?php include "./includes/footer.php" ?>
