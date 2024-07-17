<?php
// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "imperial"; // Replace 'imperial' with your actual database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("DELETE FROM p_3 WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect back to the marks list
    header("Location: P.3_Marks_ List.php");
    exit();
} else {
    echo "No ID provided.";
}
?>
