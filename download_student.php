<?php
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

// Check if student ID is set in the POST request
if(isset($_POST['student_id'])) {
    // Sanitize the student ID to prevent SQL injection
    $student_id = $conn->real_escape_string($_POST['student_id']);

    // SQL query to fetch student results from the database
    $sql = "SELECT * FROM report WHERE id = '$student_id'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if the student's results exist
    if ($result->num_rows > 0) {
        // Fetch the student's results data
        $row = $result->fetch_assoc();

        // Set the HTTP headers for file download
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="student_results_' . $row['id'] . '.txt"');

        // Output the student's results data
        echo "Student ID: {$row['StudentID']}\n";
        echo "Student Name: {$row['StudentName']}\n";
        echo "Math Marks: {$row['MathMarks']}\n";
        echo "English Marks: {$row['EnglishMarks']}\n";
        echo "SST Marks: {$row['SSTMarks']}\n";
        echo "Science Marks: {$row['ScienceMarks']}\n";
        echo "Total Marks: {$row['TotalMarks']}\n";
        echo "Average Marks: {$row['AverageMarks']}\n";
        echo "Position: {$row['Position']}\n";
    } else {
        // If student's results do not exist, output an error message
        echo "Student results not found.";
    }
} else {
    // If student ID is not set in the POST request, output an error message
    echo "Student ID not provided.";
}

// Close database connection
$conn->close();
?>
