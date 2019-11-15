<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php'?>
<div class="jumbotron">
    <form>
        <input class=""
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Staff ID</th>
                <th scope="col">Account ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Branch ID</th>
                <th scope="col">Job Title</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = 'SELECT * FROM Staff';
            // $stmt = mysqli_stmt_init($conn);
            // mysqli_stmt_prepare()
            $result = mysqli_query($conn,$sql) 
            or die("dberr:".mysqli_error($conn));
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo '<th scope="col">' . $row["StaffID"]   . "</td>";
                echo '<td>' . $row["AccountID"] . '</td>';
                echo '<td>' . $row["FullName"] . "</td>";
                echo "<td>" . $row["BranchID"] . "</td>";
                echo '<td>' . $row["Role"] . "</td>";
                echo '<td> <button class="btn btn-outline-secondary" name="edit_btn">Edit</button> </td>';
            }
            ?>
        </tbody>
    </table>

    <button class="btn btn-outline-primary" name="create_staff" data-toggle="modal" data-target="#modal_create_staff">Create Staff</button>
    <div class="modal fade" id="modal_create_staff" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" method="post">Submit</button>
                <h4 class="modal-title">Sign in</h4>
            </div>
        </div>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php' ?>