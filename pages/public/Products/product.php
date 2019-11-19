<?php
ob_start();
?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php' ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/includes/db.inc.php" ?>
<!--- Put php code here to check if login is admin then add button in order to insert products --->



<div class="jumbotron">
    <div class="row">
        <div class="container">
            <?php
            $temp = 1;
            $passVal = $_GET['prodID'];
            //echo $passVal;
            $sql = 'SELECT * FROM Product WHERE ProductID="' . $passVal . '"';
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<h1 class="card-title">';
                    echo '<a href="product.php?prodID=' . $row['ProductID'] . '" class="text-dark">' . $row["Name"] . '</a>';
                    echo '</h1>';
                    echo '<div class="row">';
                    echo '<div class="col-md-6">';
                    echo '<div class="card">';
                    echo '<img class="card-img-top" src="' . $row['ImagePath'] . '" alt="Card image cap">'; //Will take path of image per product
                    echo '<div class="card-body">';
                    echo '</div>';
                    echo '<div class="card-footer">';
                    //HERE
                    echo '<form method="POST">';
                    echo '<input class="float-right" type="number" name="replyNumber" id="replyNumber" min="1"  style="width: 35px" value="2"/>';
                    echo '<button type="submit" name="buy_btn" id="buyBtn" class="btn btn-secondary float-right">Buy</button>';
                    echo '</form>';
                    //END
                    echo '<div class="float-left">';
                    echo '' . $row["CurrentPrice"] . '';
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
                    //$temp = htmlentities($_GET['replyNumber']);
                }
            }
            ?>
            <!--- ITS NOT FUCKING WORKING FUCK, HELP MEEEEE---->
            <?php
            if (isset($_POST['buy_btn'])) {
                //$_SESSION['Basket'] = array();
                $tempCount = count($_SESSION['Basket']);
                $_SESSION['Basket'][$tempCount]['prodid'] = $passVal;
                $_SESSION['Basket'][$tempCount]['qty'] = $_POST['replyNumber'];
            }
            //print_r($_SESSION['Basket']);
            ?>

        </div>
        <div class="col"></div>
    </div>
</div>

<?php ob_flush() ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php' ?>