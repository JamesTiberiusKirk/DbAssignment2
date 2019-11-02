<?php
$servername = "mariadb";
$username = "root";
$password = "rootpwd";
$dbName = "testapp";

//for the uni database
//$servername = "";
//$username = "19ac3d02";
//$password = "ac31b2";
//$dbName = "19ac3d02";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
