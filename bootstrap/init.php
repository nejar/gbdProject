<?php

error_reporting(0);

session_start();

// Database Connection

$servername = "localhost";
$username   = "root";
$password   = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=gbd", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
