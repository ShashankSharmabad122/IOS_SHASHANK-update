<?php
// Database connection configuration
$host = 'localhost';
$dbname = 'shashank_os';
$username = 'root';
$password = '';

// Create a PDO connection
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>