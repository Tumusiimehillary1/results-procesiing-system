<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imperial"; // Replace 'imperial' with your actual database name

// Check if ID parameter is set
if (isset($_GET['ID'])) {
    $studentID = $_GET['ID'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to fetch marks data for the specified student
    $stmt = $conn->prepare("SELECT student_name, math, english, sst, science, total, average FROM marks WHERE ID = ?");
    if (!$stmt) {
        die("Failed to prepare statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("i", $studentID);

    // Execute the statement
    $stmt->execute();

    // Store result
    $result = $stmt->get_result();

    // Check if there is a row returned
    if ($result->num_rows == 1) {
        // Fetch student marks data
        $row = $result->fetch_assoc();

        // Generate CSV data
        $csvData = "Student Name, Math Marks, English Marks, SST Marks, Science Marks, Total Marks, Average Marks\n";
        $csvData .= "{$row['student_name']}, {$row['math']}, {$row['english']}, {$row['sst']}, {$row['science']}, {$row['total']}, {$row['average']}";

        // Set headers for CSV file download
        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=student_marks_{$studentID}.csv");
        header("Pragma: no-cache");
        header("Expires: 0");

        // Output CSV data
        echo $csvData;
    } else {
        // If no student found with the specified ID, return an error message
        echo "No student found with the specified ID.";
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If ID parameter is not set, return an error message
    echo "No student ID provided.";
}
?>
