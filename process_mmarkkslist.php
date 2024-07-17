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

// SQL query to fetch marks data from the database, ordered by average marks in descending order
$sql = "SELECT ID, student_name, math, english, sst, science, total, average 
        FROM marks 
        ORDER BY average DESC";

// Execute the query
$result = $conn->query($sql);

// Initialize position counter
$position = 1;

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Check if the student already exists in the 'report' table
        $check_sql = "SELECT * FROM report WHERE StudentID = '{$row['ID']}'";
        $check_result = $conn->query($check_sql);

        if ($check_result->num_rows == 0) {
            // Insert data into the 'report' table
            $insert_sql = "INSERT INTO report (StudentID, StudentName, MathMarks, EnglishMarks, SSTMarks, ScienceMarks, TotalMarks, AverageMarks, Position) 
                           VALUES ('{$row['ID']}', '{$row['student_name']}', {$row['math']}, {$row['english']}, {$row['sst']}, {$row['science']}, {$row['total']}, {$row['average']}, $position)";
            if ($conn->query($insert_sql) === TRUE) {
                echo "Data for Student ID {$row['ID']} inserted successfully.<br>";
            } else {
                echo "Error inserting data: " . $conn->error;
            }
        } else {
            echo "Data for Student ID {$row['ID']} already exists.<br>";
        }

        // Increment position counter
        $position++;
    }
} else {
    echo "No marks found.";
}

// Close database connection
$conn->close();
?>
