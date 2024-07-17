<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Retrieve student ID and name from POST data
if (isset($_POST['student_id']) && isset($_POST['student_name'])) {
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
} else {
    echo "No student ID or name provided.";
    exit();
}

// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "imperial");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Array of table names
$tables = ['p_1_report', 'p_2_report', 'p_3_report', 'p_4_report', 'p_5_report', 'p_6_report', 'p_7_report'];
$student_details = null;

// Loop through each table to find the student's report
foreach ($tables as $table) {
    $sql = "SELECT * FROM $table WHERE id = ? AND student_name = ?";
    $stmt = $mysqli->prepare($sql);

    // Check if statement preparation was successful
    if ($stmt === false) {
        error_log("Failed to prepare statement for table $table: " . $mysqli->error);
        continue;
    }

    $stmt->bind_param("ss", $student_id, $student_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Student found, fetch their details
        $student_details = $result->fetch_assoc();
        break;
    }
}

if ($student_details) {
    // Display student details for printing
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Print Student Details</title>";
    echo "<style>";
    echo "body { font-family: Arial, sans-serif; }";
    echo ".print-container { max-width: 600px; margin: auto; padding: 20px; border: 1px solid #000; }";
    echo "h2 { text-align: center; }";
    echo "p { margin-bottom: 10px; }";
    echo ".details-label { font-weight: bold; }";
    echo ".print-button { padding: 10px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease; margin-top: 10px; display: block; margin: auto; }";
    echo ".print-button:hover { background-color: #0056b3; }";
    echo "</style>";
    echo "</head>";
    echo "<body>";
    echo "<div class='print-container'>";
    echo "<h2>Student Details</h2>";
    echo "<p><span class='details-label'>Student ID:</span> " . htmlspecialchars($student_details['id']) . "</p>";
    echo "<p><span class='details-label'>Name:</span> " . htmlspecialchars($student_details['student_name']) . "</p>";
    echo "<p><span class='details-label'>Math Marks:</span> " . htmlspecialchars($student_details['math']) . "</p>";
    echo "<p><span class='details-label'>English Marks:</span> " . htmlspecialchars($student_details['english']) . "</p>";
    echo "<p><span class='details-label'>SST Marks:</span> " . htmlspecialchars($student_details['sst']) . "</p>";
    echo "<p><span class='details-label'>Science Marks:</span> " . htmlspecialchars($student_details['science']) . "</p>";
    echo "<p><span class='details-label'>Total Marks:</span> " . htmlspecialchars($student_details['total']) . "</p>";
    echo "<p><span class='details-label'>Average Marks:</span> " . htmlspecialchars($student_details['average']) . "</p>";
    echo "<p><span class='details-label'>Position:</span> " . htmlspecialchars($student_details['position']) . "</p>";
    echo "<button class='print-button' onclick='window.print()'>Print</button>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
} else {
    echo "Student details not found.";
}

// Close statement and connection
if ($stmt) {
    $stmt->close();
}
$mysqli->close();
?>
