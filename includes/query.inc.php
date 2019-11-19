<?php


function bind_query($conn, $sql, $bind_str, array $bind_vars)
{
    if ($stmt = mysqli_prepare($conn, $sql)) {

        array_unshift($bind_vars , $bind_str);
        array_unshift($bind_vars , $stmt);
        //mysqli_stmt_bind_param($stmt, $bind_str, ...$bind_vars);
        call_user_func_array('mysqli_stmt_bind_param', $bind_vars);
        mysqli_stmt_execute($stmt) or die ("dberr:".mysqli_error($conn));

        mysqli_stmt_store_result($stmt);
    } else
        echo mysqli_error($conn);

    return $stmt;
}

function fetch_query($conn, $sql)
{
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_execute($stmt) or die("dberr:" . mysqli_error($conn));
        mysqli_stmt_store_result($stmt);
    } else
        echo mysqli_error($conn);
    return $stmt;
}

function get_type($conn, $AccountID)
{
    $sql = 'SELECT `AccountType` FROM `Account` WHERE `AccountID`=?';
    $stmt = bind_query($conn, $sql, "i", array($AccountID));
    mysqli_stmt_bind_result($stmt, $AccountType);
    $acc_type = '';
    while (mysqli_stmt_fetch($stmt)) {
        $acc_type = $AccountType;
    }
    echo mysqli_stmt_error($stmt);
    return $acc_type;
}

function get_product($conn, $ProdID)
{

    $sql = 'SELECT * FROM `Product` WHERE `ProductID`=?';
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return 'error';
    } else {
        mysqli_stmt_bind_param($stmt, 's', $ProdID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
    $rtn='';
    while ($row = mysqli_fetch_assoc($result)) {
        $rtn = $row;
    }
    return $rtn;
}
