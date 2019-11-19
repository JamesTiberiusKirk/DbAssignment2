<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/header.php' ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/includes/db.inc.php"?>
<!--- Put php code here to check if login is admin then add button in order to insert products --->



<div class="jumbotron">
    <div class="row">
        
            <form action="#" method="post">
                <div class="container">
                    <?php
                        $passVal = $_GET['prodID'];
                        //echo $passVal;
                        $sql = 'SELECT * FROM Product WHERE ProductID="'.$passVal.'"';
                        $result = $conn->query($sql);
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo '<h1 class="card-title">';
                                echo '<a href="product.php?prodID='.$row['ProductID'].'" class="text-dark">' . $row["Name"] . '</a>';
                                echo '</h1>';
                                echo '<div class="row">';
                                echo '<div class="col-md-6">';
                                echo '<div class="card">';
                                echo '<img class="card-img-top" src="../../../img/products/test.jpg" alt="Card image cap">'; //Will take path of image per product
                                echo '<div class="card-body">';
                                echo '</div>';
                                echo '<div class="card-footer">';
                                echo '<div class="badge badge-secondary float-right">30%</div>';
                                echo '<div class="float-left">';
                                echo '<a href="#" class="text-danger">' . $row["CurrentPrice"] . '</a>';
                                echo '<medium class="text-muted"> £ </medium>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';

                                echo '<div class="col-md-6">';
                                echo '<div class="card">';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">';
                                echo $row["Description"];
                                echo '</h5>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                    ?>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php' ?>
