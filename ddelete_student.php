<?php
// Check if student_name parameter is set in the URL
if (isset($_GET['student_name'])) {
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

    // Prepare SQL statement to delete the student record
    $stmt = $conn->prepare("DELETE FROM marks WHERE student_name = ?");
    if (!$stmt) {
        die("Failed to prepare statement: " . $conn->error);
    }

    // Bind parameters to the SQL statement
    $stmt->bind_param("s", $_GET['student_name']);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to the marks list page after deletion
        header("Location: marks_listt.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If student_name parameter is not set, show an error message
    echo "Student name not specified.";
}
?>
