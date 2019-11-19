<?php
ob_start();
?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/header.php'?>

<?php include $_SERVER['DOCUMENT_ROOT']."/includes/db.inc.php"?>

<div class="jumbotron">
    <h1>Users Table</h1>
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
        $sql = 'SELECT * FROM Account WHERE Username = "'.$_POST['table_inp'].'"';
        // when a search is made show only 1 result
        if (isset($_POST['search_btn'])) {
            $search_result = mysqli_query($conn, $sql) or die("dberr:". mysqli_error($conn));
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
            $sql = 'SELECT * FROM Account';
            $search_result = mysqli_query($conn, $sql);
        }
        
        // when Show Table button is pressed show full table
        if (isset( $_POST['show_tbl'])) {
            $sql = "SELECT * FROM Account";
            $search_result = mysqli_query($conn, $sql);
        }

        function display_table($search_result) {
            if ($search_result->num_rows > 0) {
                // output data of each row
                    while ($row = $search_result->fetch_assoc()) {
                        echo "<tr>";
                        echo '<th scope="col">' . $row["AccountID"]   . "</td>";
                        echo '<td>' . $row["Username"] . "</td>";
                        echo "<td>" . $row["Password"] . "</td>";
                        echo '<td>' . $row["AccountType"] . "</td>";
                        echo '<form class="input-group mb-3" method="get">';
                        echo '<td> <a href="accounts_edit.php?edit_btn='.$row['AccountID'].'"class="btn btn-outline-secondary" >Edit</button> </td>';
                        echo '</form>';
                        echo '<form class="input-group mb-3" method="get">';
                        echo '<td> <a href="users.php?delete_btn='.$row['AccountID'].'"class="btn btn-outline-danger" >Delete</button> </td>';
                        echo '</form>';
                        echo "</tr>";
                    }
                } else {
                echo "0 results";
                }
        }

        if (isset($_GET['delete_btn'])) {
            $sql = 'DELETE Account FROM Account WHERE AccountID=?';
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                die ("dberr:".mysqli_error($stmt));
            }
            else {
                mysqli_stmt_bind_param($stmt, 'i', $_GET['delete_btn']);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($Stmt);

                header('Location: /pages/admin/users.php?delete%success');
            }
        }
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Password</th>
                <th scope="col">Role</th>
            </tr>
        </thead>
        <tbody>
            <?php
            display_table($search_result);
            ?>
        </tbody>
    </table>
</div>
<?php
ob_end_flush();
?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php'?>