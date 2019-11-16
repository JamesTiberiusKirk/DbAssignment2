<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php' ?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

$prod_id = '';
$prod_name = '';
$prod_type = '';
$prod_description = '';
$prod_current_price = '';
$prod_img_path = 'https://via.placeholder.com/500x500?text=Product+Image';


if (isset($_GET['prodid']) && isset($_GET['prod_name'])){
    $prod_id = $_GET['prodid'];
    $prod_name = $_GET['prod_name'];
    $prod_type =  $_GET['prod_type'];
    $prod_description = $_GET['prod_description'];
    $prod_current_price = $_GET['prod_price'];
    $prod_img_path = $_GET['prod_description'];
    $prod_img_path = $_GET['prod_img_path'];

} else if(isset($_GET['prodid'])) {
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
        $prod_type =  $row['Type'];
        $prod_description = $row['Description'];
        $prod_current_price = $row['CurrentPrice'];
        $prod_img_path = $row['ImagePath'];
    }
}
?>

<div class="jumbotron">
    
        <?php
        if (isset($_GET['prodid'])) {
            echo '<form action="/includes/products_edit.inc.php?prodid='.$prod_id.'" method="post" enctype="multipart/form-data">';
            echo '<h1>Edit Products</h1> <br>';
            echo  '<h3> Product ID: ' . $prod_id . '</h3>';
        } else {
            echo '<form action="/includes/products_edit.inc.php" method="post" enctype="multipart/form-data">';
            echo '<h1>New Prduct</h1>';
        }
        ?>
        <br>
        <div class="row">
            <div class="col-sm">

                <div class="form-group">
                    <label for="prod_name">Product Name</label>
                    <input type="text" class="form-control" id="prod_name_inp" name="prod_name_inp" value="<?php echo $prod_name; ?>">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">£</span>
                    </div>
                    <input type="text" class="form-control" name="prod_price_inp" value="<?php echo $prod_current_price; ?>">

                </div>

                <div class="form-group">
                    <label for="prod_type_inp">Select type</label>
                    <select class="form-control" name="prod_type_inp" value="<?php echo $prod_type; ?>" id="prod_type_inp">
                        <option value="Desktop">Desktop</option>
                        <option value="Laptop">Laptop</option>
                        <option value="Peripheral/Accessory">Peripheral/Accessory</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="prod_description_inp">Description</label>
                    <textarea class="form-control" name="prod_description_inp" id="prod_description_inp" rows="3"><?php echo $prod_description;
                                                                                        ?></textarea>
                </div>


            </div>
            <div class="col-sm">
                <br>

                <div class="prod_img_inp_data form-group" data-provides="prod_img_inp_data">
                    <input type="file" class="form-control-file" name="prod_img_inp" value="<?php if(isset($_GET['prodid'])){echo $prod_img_path;} ?>" id="prod_img_inp">
                    <label for="prod_img_inp">Choose file</label>
                </div>

                <img class="img-responsive" style="width:90%" id="prod_img_display" src="<?php echo $prod_img_path; ?>" alt="Product">
            </div>
        </div>

        <button type="submit" name="prod_submit" class="btn btn-secondary">
            <?php if (isset($_GET['prodid'])) {
                echo 'Update';
            } else {
                echo 'Add';
            } ?>
        </button>
    </form>
</div>

<script>
    document.getElementById('prod_img_inp').onchange = function() {
        var reader = new FileReader();

        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById('prod_img_display').src = e.target.result;
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    };
</script>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php' ?>