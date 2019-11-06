<?php include "/includes/header.php" ?>

<?php include "/includes/db.inc.php" ?>

<div class="jumbotron">
    <h1>Users Table</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $sql = "SELECT * FROM testapp.users";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='col'>" . $row["uID"]   . "</td>";
                    echo "<td>" . $row["uname"] . "</td>";
                    echo "<td>" . $row["upass"] . "</td>";
                    echo "<td>" . $row["urole"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }


            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<?php include "/includes/footer.php" ?>