<?php
// connect.php
// Central database connection

$host     = 'localhost';
$user     = 'root';
$password = '';           // XAMPP default
$database = 'ck';         // your existing DB

// Create MySQLi connection
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset('utf8mb4');
