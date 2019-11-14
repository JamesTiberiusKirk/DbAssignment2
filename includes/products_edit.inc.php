<?php

if (isset($_POST['prod_submit'])) {
    $file = $_FILES['prod_img_inp'];
    print_r($_FILES);
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
            if ($file_size < 1000) { //10mb
                $new_file_name = uniqid('', true) . '.' . $file_ext;
                $serv_file_path = $_SERVER['DOCUMENT_ROOT'] . '/img/uploads/' . $new_file_name;
                move_uploaded_file($file_tmp_name, $serv_file_path);
            } else {
                header('Location: /pages/admin/product_edit.php?error=FileTooBig');
            }
        } else {
            header('Location: /pages/admin/product_edit.php?error=UploadError');
        }
    } else {
        header('Location: /pages/admin/product_edit.php?error=WrongFileType?ext='.$file_name);
    }
} else {
    header('Location: /pages/admin/product_edit.php?error=DidNothing');
}
