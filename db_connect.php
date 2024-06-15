<?php
// MySQL database connection details
$host = 'localhost';
$user = 'estivenbedoyava';
$password = '96H@!KL5f*3Q+2%$Eg&R$p5t!M3sA';
$database = 'extreme_explorer';

// Connect to the database
$conn = mysqli_connect($host, $user, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die('Error connecting to the database: ' . mysqli_connect_error());
}
?>
