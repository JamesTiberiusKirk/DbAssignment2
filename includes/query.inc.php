<?php


function bind_query($conn, $sql, $bind_str, array $bind_vars) {
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, $bind_str, ...$bind_vars);
        mysqli_stmt_execute($stmt) or die ("dberr:".mysqli_error($conn));
        mysqli_stmt_store_result($stmt);
    }
    else
        echo mysqli_error($conn);
    
    return $stmt;
}

function fetch_query($conn, $sql) {
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_execute($stmt) or die ("dberr:".mysqli_error($conn));
        mysqli_stmt_store_result($stmt);
    }
    else
        echo mysqli_error($conn);
    return $stmt;
}

function get_type($conn, $AccountID){
    $sql = 'SELECT `AccountType` FROM `Account` WHERE `AccountID`=?';
    $stmt = bind_query($conn,$sql,"i",array($AccountID));
    mysqli_stmt_bind_result($stmt, $AccountType);
    $acc_type = '';
    while (mysqli_stmt_fetch($stmt)) {
        $acc_type = $AccountType;
    }
    echo mysqli_stmt_error($stmt);
    return $acc_type;
}
?>