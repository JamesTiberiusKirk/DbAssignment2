<?php ob_start()?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php'?>
<div class="jumbotron">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Staff ID</th>
                <th scope="col">Account ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Branch ID</th>
                <th scope="col">Job Title</th>
                <th scope="col">Schedule</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
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
                echo '<form method="get">';
                echo '<td> <a href="staff_create_schedule.php?schedule_btn='.$row['StaffID'].'" class="btn btn-outline-primary">Schedule</a> </td>';
                echo '</form>';
                echo '<form class="input-group mb-3">';
                echo '<td> <button class="btn btn-outline-secondary" name="edit_btn" action="staff_create.php" method="post">Edit</button> </td>';
                echo '</form>';
                echo '<form method="get">';
                echo '<td> <a href="staff_manager.php?delete_btn='.$row['StaffID'].'" class="btn btn-outline-danger">Delete</a> </td>';
                echo '</form>';
            }
            mysqli_free_result($result);

            if(isset($_GET['delete_btn'])) {
                $id = $_GET['delete_btn'];
                $sql = 'DELETE FROM Staff WHERE StaffID=?';
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo mysqli_error($conn);
                }
                else {
                    mysqli_stmt_bind_param($stmt, 'i', $id);
                    mysqli_stmt_execute($stmt) or die("dberr:".mysqli_error($sql));
                    mysqli_stmt_store_result($stmt);
                    $stmt->free_result();
                    header('Location: /pages/admin/staff_manager.php?success');
                }
            }

            if (isset($_POST['create_staff'])) {
                header('Location: /pages/admin/staff_create.php');
            }
            ?>
        </tbody>
    </table>
    <form class="input-group mb-3" method="post">
        <button class="btn btn-outline-primary" name="create_staff">Create Staff</button>
    </form>
    
<!-- 
    <button class="btn btn-outline-primary" name="create_staff" data-toggle="modal" data-target="#modal_create_staff" type="button">Create Staff</button>
    ignore for now until i get ajax working
    <div class="modal" tabindex="-1" role="dialog" id="modal_create_staff">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group" method="post">
                        <label for="fni">Full name</label>
                        <input class="form-control" id="fni" name="full_name_inp" type="text">
                        <label for="aci">Account ID</label>
                        <input class="form-control" id="aci" name="acc_id_inp" type="text">
                        <label for="sii">Staff ID</label>
                        <input class="form-control" id="sii" name="staff_id_inp" type="text">
                        <label for="bii">Branch ID</label>
                        <input class="form-control" id="bii" name="branch_id_inp" type="text">
                        <label for="jti">Job Title</label>
                        <input class="form-control" id="jti" name="job_title_inp" type="text">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" name="add_staff_btn" method="post">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> -->

</div>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php' ?>
<?php ob_end_flush()?>