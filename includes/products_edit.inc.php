<?php

if (isset($_POST['prod_submit'])) {


    //image uplaod folder
    $img_folder = '/img/uploads/';

    // Form fields
    $prod_name = $_POST['prod_name_inp'];
    $prod_price = $_POST['prod_price_inp'];
    $prod_type = $_POST['prod_type_inp'];
    $prod_description = $_POST['prod_description_inp'];
    $prod_img_location;

    if (empty($prod_name) || empty($prod_price) || empty($prod_description)) {
        header('Location:/2019-ac32006/team2/pages/admin/product_edit.php?error=EmptyFields&' . $rtn_vars);
        exit();
    }

    $rtn_vars = 'prod_name=' . $prod_name . '&prod_price=' . $prod_price .
        '&prod_type=' . $prod_type . '&prod_description=' . $prod_description;

    if (isset($_GET['prodid'])) {
        $rtn_vars = 'prodid=' . $_GET['prodid'] . '&' . $rtn_vars;
    }

    //File upload
    $file = $_FILES['prod_img_inp'];

    $file_name = $file['name'];
    $file_tmp_name = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_type = $file['type'];


    $file_exp = explode('.', $file_name);
    $file_ext = strtolower(end($file_exp));

    $allowed = array('jpg', 'jpeg', 'png');

    if (!empty($file_type) && in_array($file_ext, $allowed)) {
        if ($file_error == 0) {
            if ($file_size < 1.9*1048576) {
                $new_file_name = uniqid('', true) . '.' . $file_ext;
                $serv_file_path = $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2' ] . '/2019-ac32006/team2' . $img_folder . $new_file_name;
                $prod_img_location = $img_folder . $new_file_name;
                move_uploaded_file($file_tmp_name, $serv_file_path);
                $rtn_vars .= '&prod_img_path=' . $prod_img_location;
            } else {
                header('Location:/2019-ac32006/team2/pages/admin/product_edit.php?error=FileTooBig&' . $rtn_vars);
                exit();
            }
        } else {
            header('Location:/2019-ac32006/team2/pages/admin/product_edit.php?error=UploadError&'  . 'file=' . $_FILE['name'] . '&' . $rtn_vars);
            exit();
        }
    } else if (!empty($file_type) && !in_array($file_ext, $allowed)) {
        header('Location:/2019-ac32006/team2/pages/admin/product_edit.php?error=WrongFileType&' . 'file=' . $file_type . '&' . $rtn_vars);
        exit();
    }

    //Db stuff
    include_once $_SERVER[ 'DOCUMENT_ROOT' ] . '/2019-ac32006/team2' ] . '/2019-ac32006/team2' . '/includes/db.inc.php';

    if (isset($_GET['prodid']) && empty($prod_img_location)) {
        // In case the user did not update the image

        $sql = 'UPDATE `Product` '
            . 'SET `Name`=?, `Type`=?, `Description`=?, `CurrentPrice`=?'
            . ' WHERE `ProductID`=?';
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location:/2019-ac32006/team2/pages/admin/product_edit.php?error=SQLErr&' . $rtn_vars);
            exit();
        } else {
            mysqli_stmt_bind_param(
                $stmt,
                'ssssss',
                $prod_name,
                $prod_type,
                $prod_description,
                $prod_price,
                $_GET['prodid']
            );
            mysqli_stmt_execute($stmt);
            header('Location:/2019-ac32006/team2/pages/admin/product_view.php?message=succsess');
        }
    } else if (isset($_GET['prodid'])) {
        // In case the user updated the image

        $sql = 'UPDATE `Product` '
            . 'SET `Name`=?, `Type`=?, `Description`=?, `CurrentPrice`=?, `ImagePath`=? '
            . 'WHERE `ProductID`=?';
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location:/2019-ac32006/team2/pages/admin/product_edit.php?error=SQLErr&' . $rtn_vars);
            exit();
        } else {
            mysqli_stmt_bind_param(
                $stmt,
                'ssssss',
                $prod_name,
                $prod_type,
                $prod_description,
                $prod_price,
                $prod_img_location,
                $_GET['prodid']
            );
            mysqli_stmt_execute($stmt);
            header('Location:/2019-ac32006/team2/pages/admin/product_view.php?message=succsess');
        }
    } else {
        // In case the user is adding a new record

        $sql = 'INSERT INTO `Product` '
            . '(`Name`, `Type`, `Description`, `CurrentPrice`, `ImagePath`) '
            . 'VALUES (?,?,?,?,?)';
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location:/2019-ac32006/team2/pages/admin/product_edit.php?error=SQLErr&' . $rtn_vars);
            exit();
        } else {
            mysqli_stmt_bind_param(
                $stmt,
                'sssss',
                $prod_name,
                $prod_type,
                $prod_description,
                $prod_price,
                $prod_img_location
            );
            mysqli_stmt_execute($stmt);
            header('Location:/2019-ac32006/team2/pages/admin/product_view.php?message=succsess');
        }
    }
} else {
    header('Location:/2019-ac32006/team2/pages/admin/product_edit.php?error=ProdSubmitNotSet');
}
