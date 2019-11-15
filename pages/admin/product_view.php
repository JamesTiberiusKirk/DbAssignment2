<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/header.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/includes/db.inc.php'?>

<div class="jumbotron">
    <div class="col">
        <div class="container">
            <div class="row">
                <h1>Admin Product View</h1>
                <form class="input-group mb-3" method="post">
                    <input class="form-control" name="table_inp" type="text" placeholder="Search Product name" method="post">
                    <button class="btn btn-outline-secondary" name="search_btn" type="submit">Search</button>
                    <button class="btn btn-outline-secondary" name="show_tbl">Show Table</button>
                    <button type="button" class="btn btn-outline-secondary">Add</button>
                </form> 
                <?php 
                        $table_inp = $_POST['table_inp'];
                        $search_btn = $_POST['search_btn'];
                        $show_table = $_POST['show_tbl'];
                        if(isset($search_btn)){
                            $sql = "SELECT * FROM testapp.products WHERE Name='$table_inp'";
                            $sql = "SELECT * FROM Product WHERE ProductID BETWEEN 1 AND 10000";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                                echo "Product Found, " . $result->num_rows . " results:";
                            } else {
                                echo "No products found!";
                            }
                        } else {
                            $sql = "SELECT * FROM testapp.products";
                            $result = $conn->query($sql);
                        }
                        
                        if(isset($show_table)){
                            $sql = "SELECT * FROM testapp.products";
                            $result = $conn->query($sql);
                        }

                        

                        function display_product($searchResult){
                            if($searchResult->num_rows > 0){
                                while($row = $searchResult->fetch_assoc()){
                                    echo '<tr>';
                                    echo '<th scope="row">' . $row["ProductID"] . '</th>';
                                    echo '<td>' . $row["Name"] . '</td>';
                                    echo '<td>' . $row["Type"] . '</td>';
                                    echo '<td>' . $row["CurrentPrice"] . '£' . '</td>';
                                    echo '<td> # </td>';
                                    echo '<td> ';
                                    echo '<button type="button" name="' . $row["ProductID"] . '" class="btn btn-secondary">edit</button> ';
                                    echo '<button type="button" name="' . $row["ProductID"] . '" class="btn btn-secondary">delete</button>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr>';
                                echo "Zero results";
                                echo '</tr>';
                            }
                        }
                    ?>
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
                            display_product($result);
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php' ?>
