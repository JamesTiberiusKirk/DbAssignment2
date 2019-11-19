<?php ob_start();?>

<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2' . '/includes/header.php' ?>
<?php include_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2' . '/includes/db.inc.php' ?>

<div class="jumbotron">
    <div class="col">
        <div class="container">
            <div class="row">
                <h1>Admin Product View</h1>
                <form class="input-group mb-3" method="post">
                    <input class="form-control" name="table_inp" type="text" placeholder="Search Product name" method="post">
                    <button class="btn btn-outline-secondary" name="search_btn" type="submit">Search</button>
                    <button class="btn btn-outline-secondary" name="show_tbl">Show Table</button>
                    <a href="product_edit.php" class="btn btn-outline-secondary">Add</a>
                </form> 
                <?php 
                        $table_inp = $_POST['table_inp'];
                        $search_btn = $_POST['search_btn'];
                        $show_table = $_POST['show_tbl'];
                        $delete_val = $_GET['delete_val'];

                        if(isset($_POST['search_btn'])){
                            $sql = "SELECT * FROM Product WHERE Name='$table_inp'";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0){
                                echo "Product Found, " . $result->num_rows . " results:";
                            } else {
                                echo "No products found!";
                            }
                        } else {
                            $sql = "SELECT * FROM Product";
                            $result = $conn->query($sql);
                        }
                        
                        if(isset($_POST['show_tbl'])){
                            $sql = "SELECT * FROM Product";
                            $result = $conn->query($sql);
                        }

                        if(isset($_GET['delete_val'])){
                            $deleteSQL = 'DELETE FROM Product WHERE ProductID="'.$delete_val.'"';
                            $deleteResult = $conn->query($deleteSQL);
                            header("Location: /pages/admin/product_view.php?Success");
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
                                    echo '<a href="product_edit.php?prodid='.$row['ProductID'].'" class="btn btn-secondary"> edit </a>';
                                    echo '<a href="product_view.php?delete_val=' . $row["ProductID"] . '" class="btn btn-secondary">delete</button>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '0 Results found';
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

<?php ob_end_flush(); ?>
<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/footer.php' ?>
