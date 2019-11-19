<?php ob_start() ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/2019-ac32006/team2/'.'/includes/header.php' ?>

<div class="jumbotron">
    <h1>Shopping Cart</h1>
    <?php

    include_once($_SERVER['DOCUMENT_ROOT'].'/2019-ac32006/team2/'.'/includes/db.inc.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/2019-ac32006/team2/'.'/includes/query.inc.php');

    if (!isset($_SESSION['AccountID']) || (get_type($conn, $_SESSION['AccountID']) == 'customer ')) {
        header('Location: /2019-ac32006/team2/index.php');
        exit();
    }



    function display_basket(){
        include_once($_SERVER['DOCUMENT_ROOT'].'/2019-ac32006/team2/'.'/includes/db.inc.php');
        include_once($_SERVER['DOCUMENT_ROOT'].'/2019-ac32006/team2/'.'/includes/query.inc.php');

        if (!isset($_SESSION['Basket']) || empty($_SESSION['Basket'])) {
            echo '<h2>Cart empty</h2>';
            echo '<br>';
            exit();
        } else{
            $tempCount = 0;
            foreach($_SESSION['Basket'] as $basket){
                //product = get_product($conn, $basket[$tempCount]['ProdID']);
                $sql = 'SELECT * FROM Product WHERE ProductID="' . $basket[$tempCount]['prodid'] . '"';
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo '<tr>';
                        echo '<td> '. $row['Name'] . ' </td>';
                        //echo '<td>' . $product['ImagePath'] . ' ' . $product['Name'] . '</td>';
                        //echo '<td>' . $product['CurrentPrice'] . '</td>';
                        //echo '<td>' . $_SESSION['Basket']['i']['Qty'] . '</td>';
                        echo '</tr>';
                    }
                }
                
            }
            

        }
    }
    ?>
    <table class="table table-dark">

        <thead>
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Qantity</th>
            </tr>
        </thead>
        <tbody>
            <?php
            display_basket();
            ?>

        </tbody>
        <h3>Total £<?php echo $order_total ?></h3>
    </table>
</div>
<?php ob_end_flush() ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/2019-ac32006/team2/'.'/includes/footer.php' ?>