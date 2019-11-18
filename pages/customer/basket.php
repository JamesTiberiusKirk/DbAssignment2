<?php ob_start() ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php' ?>

<div class="jumbotron">
    <h1>Shopping Cart</h1>
    <?php

    include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/query.inc.php');

    if (!isset($_SESSION['AccountID']) || (get_type($conn, $_SESSION['AccountID']) == 'customer ')) {
        header('Location: /index.php');
        exit();
    }

    $Products = get_product($conn, 2001);
    print_r($Products);

    function display_basket(){
        if (!isset($_SESSION['Basket']) || empty($_SESSION['Basket'])) {
            echo '<h2>Cart empty</h2>';
        } else {
            $basket = $_SESSION['Basket'];
    
            for ($i = 0; $i = count($basket); $i++) { 
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
    </table>
</div>
<?php ob_end_flush() ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php' ?>