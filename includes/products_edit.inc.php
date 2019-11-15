<?php

if (isset($_POST['prod_submit'])) {


    // Form fields
    $prod_name = $_POST['prod_name_inp'];
    $prod_price = $_POST['prod_price_inp'];
    $prod_type = $_POST['prod_type_inp'];
    $prod_description = $_POST['prod_description_inp'];

    if (empty($prod_name) || empty($prod_price) || empty($prod_description)) {
        header('Location: /pages/admin/product_edit.php?error=EmptyFields&' .
            'prod_name=' . $prod_name . '&prod_price=' . $prod_price .
            '&prod_type=' . $prod_type . '&prod_description=' . $prod_description);
        exit();
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

    if (in_array($file_ext, $allowed)) {
        if ($file_error == 0) {
            if ($file_size < 10000000) {
                $new_file_name = uniqid('', true) . '.' . $file_ext;
                $serv_file_path = $_SERVER['DOCUMENT_ROOT'] . '/img/uploads/' . $new_file_name;
                move_uploaded_file($file_tmp_name, $serv_file_path);
            } else {
                header('Location: /pages/admin/product_edit.php?error=FileTooBig&' .
                    'prod_name=' . $prod_name . '&prod_price=' . $prod_price .
                    '&prod_type=' . $prod_type . '&prod_description=' . $prod_description);
                exit();
            }
        } else {
            header('Location: /pages/admin/product_edit.php?error=UploadError&' .
                'prod_name=' . $prod_name . '&prod_price=' . $prod_price .
                '&prod_type=' . $prod_type . '&prod_description=' . $prod_description);
            exit();
        }
    } else {
        header('Location: /pages/admin/product_edit.php?error=WrongFileType&' .
            'prod_name=' . $prod_name . '&prod_price=' . $prod_price .
            '&prod_type=' . $prod_type . '&prod_description=' . $prod_description);
        exit();
    }

    //Db stuff
    include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

    if (isset($_GET['prodid'])) {
        $sql = 'UPDATE `Product` SET '
            . '(`Name`, `Type`, `Description`, `CurrentPrice`, `ImagePath`) '
            . 'VALUES (?,?,?,?,?) WHERE ?=`ProductID`';
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: /pages/admin/product_edit.php?error=SQLErr&' .
                'prod_name=' . $prod_name . '&prod_price=' . $prod_price .
                '&prod_type=' . $prod_type . '&prod_description=' . $prod_description);
            exit();
        } else {
            mysqli_stmt_bind_param(
                $stmt,
                'ssssss',
                $prod_name,
                $prod_type,
                $prod_description,
                $prod_price,
                $serv_file_path,
                $_GET['prodid']
            );
            mysqli_stmt_execute($stmt);
            header('Location: /pages/admin/product_edit.php?message=succsess');
        }
    } else {
        $sql = 'INSERT INTO `Product` '
            . '(`Name`, `Type`, `Description`, `CurrentPrice`, `ImagePath`) '
            . 'VALUES (?,?,?,?,?)';
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: /pages/admin/product_edit.php?error=SQLErr&' .
                'prod_name=' . $prod_name . '&prod_price=' . $prod_price .
                '&prod_type=' . $prod_type . '&prod_description=' . $prod_description);
            exit();
        } else {
            mysqli_stmt_bind_param(
                $stmt,
                'sssss',
                $prod_name,
                $prod_type,
                $prod_description,
                $prod_price,
                $serv_file_path
            );
            mysqli_stmt_execute($stmt);
            header('Location: /pages/admin/product_edit.php?message=succsess');
        }
    }
} else {
    header('Location: /pages/admin/product_edit.php?error=ProdSubmitNotSet');
}
