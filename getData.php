<?php
$servername = '127.0.0.1'; 
$username = 'root'; 
$password = ''; 
$dbname = 'mycampus';

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from your table, change 'your_table_name' with the actual table name
$sql = "SELECT * FROM registration";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // Fetch data from the result and store it in an array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Close the connection
$conn->close();

// Set the response content type to JSON
header('Content-Type: application/json');

// Convert the PHP array to JSON and echo the response
echo json_encode($data);
?>
