<?php include "../../includes/header.php" ?>
<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'."/includes/db.inc.php"?>

<div class="jumbotron">
    <div class="col">
        <div class="container">
        <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Shopping cart
                
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                    <!-- PRODUCT -->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="http://placehold.it/120x80" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong>Product Name</strong></h4>
                            <h4>
                                <small>Product description</small>
                            </h4>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                            <div class="row">
                                <h6><strong>25.00£<span class="text-muted">x</span></strong></h6>
                            </div>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <!-- END PRODUCT -->
                <div class="pull-right">
                    <a href="" class="btn btn-outline-secondary pull-right">
                        Clear Shopping cart
                    </a>
                </div>
            </div>
            <div class="card-footer">
                <div class="pull-right" style="margin: 10px">
                    <a href="" class="btn btn-success pull-right">Checkout</a>
                    <div class="pull-right" style="margin: 5px">
                        Total price: <b>50.00£</b>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="col"></div>
</div>


<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2'.'/includes/footer.php' ?>