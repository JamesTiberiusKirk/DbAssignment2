<?php include "header.php" ?>

<div class="jumbotron">
    <?php
    $servername = "mariadb";
    $username = "root";
    $password = "rootpwd";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "<br>Connected successfully<br>";

    $sql = "SELECT uID, uname FROM testapp.users";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["uID"] . " - username: " . $row["uname"] . "<br>";
        }
    } else {
        echo "0 results";
    }


    $conn->close();
    ?>
</div>

<?php include "footer.php" ?>