<?php
$servername_db = "mariadb";
$username_db = "root";
$password_db = "rootpwd";
$name_db = "testapp";

//for the uni database
//$servername = "";
//$username = "19ac3d02";
//$password = "ac31b2";
//$dbName = "19ac3d02";


// Create connection
$conn = new mysqli($servername_db, $username_db, $password_db, $name_db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
