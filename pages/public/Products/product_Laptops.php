<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/header.php' ?>
<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'."/includes/db.inc.php"?>
<!--- Put php code here to check if login is admin then add button in order to insert products --->



<div class="jumbotron">
    <div class="row">
        
            <form action="#" method="post">
                <div class="container">
                    <div class="row">
                        <?php
                            $count = 1;
                            $sql = "SELECT * FROM Product WHERE Type='Laptop' ORDER BY CurrentPrice DESC";//Change for new DB for type
                            $result = $conn->query($sql);
                            
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo '<div class="col-md-3">';
                                    echo '<div class="card" >';
                                    echo '<img class="card-img-top" src=" ' . $row['ImagePath'] . '" alt="Card image cap">'; //Will take path of image per product
                                    echo '<div class="card-body">';
                                    echo '<h5 class="card-title">';
                                    echo '<a href="product.php?prodID='.$row['ProductID'].'" class="text-dark">' . $row["Name"] . '</a>';
                                    echo '</h5>';
                                    echo '</div>';
                                    echo '<div class="card-footer">';
                                    echo '<form method="get">';
                                    echo '<a href="product_Laptops.php?prodID=' . $row['ProductID'] . '" name="buy_btn" class="btn btn-secondary float-right">Buy</a>';
                                    echo '</form>';
                                    echo '<div class="float-left">';
                                    echo '' . $row["CurrentPrice"] . '';
                                    echo '<medium class="text-muted"> £ </medium>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';

                                    if($count==4){
                                        $count = 1;
                                        echo '</div>';
                                        echo '<br>' . '</br>';
                                        echo '<div class="row">';
                                    } else {
                                        $count++;
                                    }

                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                        ?>
                        
                        <?php
                            //$_SESSION['Basket'] = array();
                            if (isset($_GET['prodID'])) {
                                $passVal = $_GET['prodID'];
                                $tempCount = count($_SESSION['Basket']);
                                $_SESSION['Basket'][$tempCount]['prodid'] = $passVal;
                                $_SESSION['Basket'][$tempCount]['qty'] = 1;
                            }
                        ?>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>

<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/footer.php' ?>
