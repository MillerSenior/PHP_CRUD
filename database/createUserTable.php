<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "PHPApplication";//pre-existing database created by createDB.php

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE user (
user_id VARCHAR(20) NOT NULL PRIMARY KEY,
user_password VARCHAR(100) NOT NULL,
user_name VARCHAR(60) NOT NULL,
user_date TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Table user created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>