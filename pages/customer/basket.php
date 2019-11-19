<?php ob_start() ?>

<?php include $_SERVER['DOCUMENT_ROOT'].'/2019-ac32006/team2/'.'/includes/header.php' ?>
<?php include $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2' . '/includes/db.inc.php' ?>

<div class="jumbotron">
    <h1>Shopping Cart</h1>
    <?php

    include_once($_SERVER['DOCUMENT_ROOT'].'/2019-ac32006/team2/'.'/includes/db.inc.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/2019-ac32006/team2/'.'/includes/query.inc.php');

    if (!isset($_SESSION['AccountID']) || (get_type($conn, $_SESSION['AccountID']) == 'customer ')) {
        header('Location: /2019-ac32006/team2/index.php');
        exit();
    }



    function display_basket(mysqli $con){
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
                $sql = 'SELECT * FROM Product WHERE ProductID="' . $_SESSION['Basket'][$tempCount]["prodid"] . '"';
                $result = mysqli_query($con,$sql);
                //echo '<td> '. $_SESSION['Basket'][0][0] . ' </td>';
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo '<tr>';
                        echo '<td> '. $row['Name'] . ' </td>';
                        echo '<td> '. $row['CurrentPrice'] . ' </td>';
                        echo '<td> '. $_SESSION['Basket'][$tempCount]["qty"] . ' </td>';
                        echo '</tr>';
                    }
                }
                //echo '<td>' . $_SESSION['Basket'][$tempCount]["prodid"] . '</tr>';
                $tempCount = $tempCount + 1;
                
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
            display_basket($conn);
            ?>

        </tbody>
        <h3>Total £<?php echo $order_total ?></h3>
    </table>
</div>
<?php ob_end_flush() ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/2019-ac32006/team2/'.'/includes/footer.php' ?>