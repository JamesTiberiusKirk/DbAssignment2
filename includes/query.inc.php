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
?>