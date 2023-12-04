<?php
// getData.php

$conn = mysqli_connect('localhost', 'root', '', 'inventory_system');

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Query to count the number of rows in the users table
$sql = 'SELECT COUNT(*) as userCount FROM products';
$result = $conn->query($sql);

// Fetch the result
$data = $result->fetch_assoc();

// Close the connection
$conn->close();

// Return the count as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
