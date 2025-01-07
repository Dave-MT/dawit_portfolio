<?php
$host = 'localhost';  // Database host
$dbname = 'Portfolio';   // Database name
$username = 'dave';   // Database username
$password = 'dawit123';       // Database password

// Set the DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

// Additional options to ensure compatibility with newer MySQL authentication methods
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enable error handling
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Fetch results as associative arrays
    PDO::ATTR_EMULATE_PREPARES => false, // Use native MySQL prepared statements
];

// Create the PDO connection
try {
    // Attempt to connect to the MySQL database with caching_sha2_password authentication support
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>