<?php include "../../includes/header.php" ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/includes/db.inc.php"?>

<div class="jumbotron">
    <div class="col">
        <div class="container">
            <div class="row">
            <form class="input-group mb-3" method="post">
                <input class="form-control" name="table_inp" type="text" placeholder="Search Product name" method="post">
                <button class="btn btn-outline-secondary" name="search_btn" type="submit">Search</button>
                <button class="btn btn-outline-secondary" name="show_tbl">Show Table</button>
            </form> <!--- I dont know how to do this part i will attempt it later --->
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ProductID</th>
                            <th scope="col">ProductName</th>
                            <th scope="col">Type</th>
                            <th scope="col">CurrentPrice</th>
                            <th scope="col">StockQuantity</th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM testapp.products WHERE ProductID";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo '<tr>';
                                        echo '<th scope="row">' . $row["ProductID"] . '</th>';
                                        echo '<td>' . $row["Name"] . '</td>';
                                        echo '<td>' . $row["Type"] . '</td>';
                                        echo '<td>' . $row["CurrentPrice"] . '</td>';
                                        echo '<td> # </td>';
                                        echo '<td> <button type="button" class="btn btn-secondary">edit</button> </td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr>';
                                        echo "Zero results";
                                echo '</tr>';
                            }

                            $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php' ?>
