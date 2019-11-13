<?php
$servername_db = "mariadb";
$username_db = "root";
$password_db = "rootpwd";
$name_db = "ETWorld";

//for the uni database
//$servername = "silva.computing.dundee.ac.uk";
//$username = "19ac3d02";
//$password = "ac31b2";
//$name_db = "19ac3d02";


// Create connection
$conn = new mysqli($servername_db, $username_db, $password_db, $name_db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
