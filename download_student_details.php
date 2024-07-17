<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Check if the download button is clicked
if (isset($_POST['download'])) {
    // Get student ID and name from the form
    $student_id = $_POST['student_id'];
    $student_name = $_SESSION["username"]; // Assuming the student name is the logged-in username

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
        $filename = "student_details_" . $student_id . ".txt";
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        // Write student details to the file
        $file_content = "Student ID: " . $student_details['id'] . "\n";
        $file_content .= "Name: " . $student_details['student_name'] . "\n";
        $file_content .= "Math Marks: " . $student_details['math'] . "\n";
        $file_content .= "English Marks: " . $student_details['english'] . "\n";
        $file_content .= "SST Marks: " . $student_details['sst'] . "\n";
        $file_content .= "Science Marks: " . $student_details['science'] . "\n";
        $file_content .= "Total Marks: " . $student_details['total'] . "\n";
        $file_content .= "Average Marks: " . $student_details['average'] . "\n";
        $file_content .= "Position: " . $student_details['position'] . "\n";

        echo $file_content;
        exit();
    } else {
        // Student details not found
        echo "Student details not found.";
    }

    // Close statement and connection
    $stmt->close();
    $mysqli->close();
} else {
    // If download button is not clicked, redirect to student details page
    header("Location: fetch_student_details.php");
    exit();
}
?>
