<?php

// $servername_db = "mariadb";
// $username_db = "root";
// $password_db = "rootpwd";
// $name_db = "ETWorld";

// for the uni database
$servername_db = "silva.computing.dundee.ac.uk";
$username_db = "19ac3u02";
$password_db = "ac31b2";
$name_db = "19ac3d02";


// Create connection
$conn = new mysqli($servername_db, $username_db, $password_db, $name_db);
//$conn->setAttribute( PDO::ATTR_EMULATE_PREPARES, true);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
