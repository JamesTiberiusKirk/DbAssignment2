<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/header.php'?>

<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'."/includes/db.inc.php"?>

<div class="jumbotron">
    <h1>Products Table</h1>
    
    <form class="input-group mb-3" method="post">
        <input class="form-control" name="table_inp" type="text" placeholder="Username" method="post">
        <button class="btn btn-outline-secondary" name="search_btn" type="submit">Search</button>
        <button class="btn btn-outline-secondary" name="show_tbl">Show Table</button>
    </form>
        <!--
        Setting up the querys
        -->
        <?php
        $table_inp = $_POST['table_inp'];
        $search_btn = $_POST['search_btn'];
        $show_table = $_POST['show_tbl'];
        $sql = "SELECT * FROM products WHERE uname='$table_inp'";
        // when a search is made show only 1 result
        if (isset($search_btn)) {
            $search_result = mysqli_query($conn, $sql);
            $row = $search_result->num_rows;
            if ($row) {
                echo "User found, ".$row." result";
            }
            else {
                echo "User not found, ";        
            }
        }
        else {
            // when the page first loads show full table
            $sql = "SELECT * FROM users";
            $search_result = mysqli_query($conn, $sql);
        }
        
        // when Show Table button is pressed show full table
        if (isset($show_table)) {
            $sql = "SELECT * FROM users";
            $search_result = mysqli_query($conn, $sql);
        }

        function display_table($editable, $search_result) {
            if ($search_result->num_rows > 0) {
                // output data of each row
                    while ($row = $search_result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='col'>" . $row["uID"]   . "</td>";
                        echo "<td>" . $row["uname"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["urole"] . "</td>";
                        if ($search_result->num_rows == 1) {
                            echo "<form action='edit.php' class='input-group mb-3' method='post'>";
                            echo "<td> <button class='btn btn-outline-secondary' name='edit_btn'>Edit</button> </td>";
                            echo "</form>";
                            session_start();
                            $_SESSION['uname'] = $row['uname'];
                            $_SESSION['urole'] = $row['urole'];
                            $_SESSION['uID'] = $row['uID'];
                        }
                        echo "</tr>";
                    }
                } else {
                echo "0 results";
                }
        }
    ?>
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
            display_table('false', $search_result);
            ?>
        </tbody>
    </table>
</div>

<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/footer.php'?>