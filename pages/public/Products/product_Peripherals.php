<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/header.php' ?>
<?php include $_SERVER['DOCUMENT_ROOT']."/includes/db.inc.php"?>
<!--- Put php code here to check if login is admin then add button in order to insert products --->



<div class="jumbotron">
    <div class="row">
        
            <form action="#" method="post">
                <div class="container">
                    <div class="row">
                        <?php
                        $product = "SELECT * FROM PRODUCT";
                        $productResult = mysqli_query($conn, $product);
                        
                        while($row = $productResult->fetch_assoc()){
                            echo $row['ProductID'];
                        }
                        ?>
                        <!---- ---->
                        <div class="col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="../../../img/products/test.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="#" class="text-dark">SpaceWare</a>
                                    </h5>
                               </div>
                                <div class="card-footer">
                                    <div class="badge badge-danger float-right">30%</div>
                                    <div class="float-left">
                                        <a href="#" class="text-danger">199 USD</a>
                                       <br>
                                       <small class="text-muted"><del>Stuff</del></small>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <!---  --->


                        <div class="col-md-3">
                            <div class="card">
                                <img class="card-img-top" src="../../../img/products/test.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="#" class="text-dark">SpaceWare</a>
                                    </h5>
                               </div>
                                <div class="card-footer">
                                    <div class="badge badge-danger float-right">30%</div>
                                    <div class="float-left">
                                        <a href="#" class="text-danger">199 USD</a>
                                       <br>
                                       <small class="text-muted"><del>Stuff</del></small>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <!--- ---->
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/includes/footer.php' ?>
