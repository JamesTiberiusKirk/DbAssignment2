<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php' ?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

if (isset($_GET['prodid'])) {
    $sql = 'SELECT * FROM `Product` WHERE `ProductID`=?';
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_bind_param($stmt, 's', $_GET['prodid']);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
}
?>

<div class="jumbotron">
    <form action="/includes/products_edit.inc.php" method="post">
        <h1>Products edit</h1>
        <?php
        while ($row = $stmt->fetch_assoc()) { 
            echo $row['ProductID'];
        }
        ?>
    </form>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php' ?>