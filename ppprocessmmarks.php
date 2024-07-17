<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "imperial"; // Replace 'your_dbname' with your actual database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve data from the form
    $student_name = $_POST['student_name'] ?? '';
    $math = $_POST['math'] ?? 0;
    $english = $_POST['english'] ?? 0;
    $sst = $_POST['sst'] ?? 0;
    $science = $_POST['science'] ?? 0;
    $total = $_POST['total'] ?? 0;
    $average = $_POST['average'] ?? 0;
    $position = $_POST['position'] ?? 0;

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO marks (student_name, math, english, sst, science, total, average, position) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Failed to prepare statement: " . $conn->error);
    }

    // Bind parameters to the SQL statement
    $stmt->bind_param("siiiiidi", $student_name, $math, $english, $sst, $science, $total, $average, $position);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If the form is not submitted via POST method, show an error message
    echo "No data submitted.";
}
?>
