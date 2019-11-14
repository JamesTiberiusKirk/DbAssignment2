<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php' ?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

$prod_id = '';
$prod_name = '';
$prod_type = '';
$prod_description = '';
$prod_current_price = '';
$prod_img_path = '';


if (isset($_GET['prodid'])) {
    $sql = 'SELECT * FROM `Product` WHERE `ProductID`=?';
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo 'SQL error';
    } else {
        mysqli_stmt_bind_param($stmt, 's', $_GET['prodid']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $prod_id = $row['ProductID'];
        $prod_name = $row['Name'];
        $prod_type =  $row['Tyoe'];
        $prod_description = $row['Description'];
        $prod_current_price = $row['CurrentPrice'];
        $prod_img_path = $row['ImagePath'];
    }
}
?>

<div class="jumbotron">
    <form action="/includes/products_edit.inc.php" method="post">

        <?php
        if (isset($_GET['prodid'])) {
            echo '<h1>Products edit</h1> <br>';
            echo  '<h3> Product ID: ' . $prod_id . '</h3>';
        } else {
            echo '<h1>Products add</h1>';
        }
        ?>

        <div class="form-group">
            <label for="prod_name">Product Name</label>
            <input type="text" class="form-control" id="prod_name_inp" value="<?php echo $prod_name; ?>">
        </div>
        <div class="form-group">
            <label for="prod_description_inp">Description</label>
            <textarea class="form-control" id="prod_description_inp" rows="3"><?php echo $prod_description; ?>
            </textarea>
        </div>

        <img src="<?php echo $prod_img_path; ?>" alt="Product">

        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>


    </form>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php' ?>