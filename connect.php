<?php

$servername = "localhost";
$username = "root";
$password ="";
$database = "imperial";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

// Don't forget to close the connection when you are done.
$conn->close();

?>
