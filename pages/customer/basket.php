<?php ob_start() ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/2019-ac32006/team2/'.'/includes/header.php' ?>

<div class="jumbotron">
    <?php
    if (isset($_GET['orderconfirmed'])){
        echo "Order confirmed! Have a nice day!";
    }
    ?>
    <h1>Shopping Cart</h1>
    <?php
    $GLOBALS['total'] = 0;
    include_once($_SERVER['DOCUMENT_ROOT'].'/2019-ac32006/team2/'.'/includes/db.inc.php');
    include_once($_SERVER['DOCUMENT_ROOT'].'/2019-ac32006/team2/'.'/includes/query.inc.php');

    if (!isset($_SESSION['AccountID']) || (get_type($conn, $_SESSION['AccountID']) == 'customer ')) {
        header('Location: /2019-ac32006/team2/index.php');
        exit();
    }

    


    function display_basket($conn){
        $GLOBALS['total'] = 0;
        include_once($_SERVER['DOCUMENT_ROOT'].'/2019-ac32006/team2/'.'/includes/db.inc.php');
        include_once($_SERVER['DOCUMENT_ROOT'].'/2019-ac32006/team2/'.'/includes/query.inc.php');

        if (!isset($_SESSION['Basket']) || empty($_SESSION['Basket'])) {
            echo '<h2>Cart empty</h2>';
            echo '<br>';
            exit();
        } else{
            foreach($_SESSION['Basket'] as $basket){
                //product = get_product($conn, $basket[$tempCount]['ProdID']);
                $sql = 'SELECT * FROM Product WHERE ProductID="' . $basket['prodid'] . '"';
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo '<tr>';
                        echo '<td> <img class="img-fluid prod_icon" src="'.$row['ImagePath'].'"> </td>';
                        echo '<td> ' . $row['Name'] . ' </td>';
                        //echo '<td>' . $row['ImagePath'] . ' ' . $product['Name'] . '</td>';
                        echo '<td>' . $row['CurrentPrice'] . '</td>';
                        echo '<td>' . $basket['qty'] . '</td>';
                        echo '</tr>';
                        $GLOBALS['total'] = $GLOBALS['total'] + $row['CurrentPrice'];
                    }
                }
            }
            echo '<tr>';
            echo '<td> </td>';
            echo '<td> </td>';
            echo '<td> </td>';
            echo '<td> </td>';
            echo '<td> £' . $GLOBALS['total'] . '</td>';
            echo '</tr>';
        }
    }

    function checkout($conn){
        $cust_addr = " ";
        $cust_id = " ";
        $sql = 'SELECT * FROM customer WHERE AccountID="' . $_SESSION['AccountID'] . '"';
        $result = $conn->query($sql) or die('dberr:'.msqli_error($conn));
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                $cust_addr = $row['CustomerAddress'];
                $cust_id = $row['CustomerID'];
            }
        } else {
            echo "No address set";
            return false;
        }

        $sql = 'INSERT INTO CustomerOrder(ProductID, Quantity, OrderPrice, DeliveryAddress, Time, CustomerID)
        VALUES (?, ?, ?, ?, ?, ?)';

        foreach($_SESSION['Basket'] as $basket){
            $stmt = bind_query($conn, $sql, 'iiissi', array($basket['prodid'], $basket['qty'], $GLOBALS['total'], $cust_addr, date("Y-m-d"), $cust_id));
        }
        return true;
    }

    

    ?>
    <table class="table">

        <thead>
            <tr>
                <th style="width: 10%" scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">total Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            display_basket($conn);
            ?>
        </tbody>
        <!--- <h3>Total £</h3> --->

    </table>
    
    <form method="post">
        <button name="checkBtn" id="checkBtn" class="btn btn-outline-dark float-right" onclick="return confirm('Are you sure you want to checkout?')">Checkout</button>
    </form>
    <?php
    if(isset($_POST['checkBtn'])){
        if (checkout($conn)) {
            $_SESSION['Basket'] = array();
            header('Location: basket.php?orderconfirmed');
        }
    }
    ?>
</div>

<?php ob_end_flush() ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'/2019-ac32006/team2/'.'/includes/footer.php' ?>