<?php include $_SERVER['DOCUMENT_ROOT']."/includes/db.inc.php"?>
<?php
$col = $_POST['column'];
$val = $_POST['value'];
$uID = $_POST['uID'];
$sql = "UPDATE testapp.users SET " . $col . " = '" . $val ."'WHERE uID=". $uID;
query($conn, $sql) or die("dberr:". mysqli_error($conn));
?>