<?php

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "fashion_db";

// Create database connection
$conn = new mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
