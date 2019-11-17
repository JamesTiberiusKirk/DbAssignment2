<?php
function bind_query($conn, $stmt, $sql, $bind_str, array $vars) {
    $result = NULL;
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo mysqli_error($conn);
    }
    else {
        mysqli_stmt_bind_param($stmt, $bind_str, ...$vars);
        mysqli_stmt_execute($stmt) or die("dberr:".mysqli_error($conn));
        mysqli_stmt_store_result($stmt);
    }
    return $stmt;
}

function display_query($conn, $sql) {
    $stmt = mysqli_stmt_init($conn);
    $result = NULL;
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo mysqli_error($conn);
    }
    else {
        mysqli_stmt_execute($stmt) or die("dberr:".mysqli_error($sql));
        mysqli_stmt_store_result($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $stmt->free_result();
    }
    return $result;
}
?>