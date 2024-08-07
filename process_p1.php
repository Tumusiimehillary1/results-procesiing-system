<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Retrieve form data
    $student_name = $_POST['student_name'];
    $math = intval($_POST['math']);
    $english = intval($_POST['english']);
    $sst = intval($_POST['sst']);
    $science = intval($_POST['science']);

    // Calculate total and average
    $total = $math + $english + $sst + $science;
    $average = $total / 4;

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO p_1 (student_name, math, english, sst, science, total, average) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    // Check if prepare() was successful
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("siiiiid", $student_name, $math, $english, $sst, $science, $total, $average);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Marks submitted successfully.";
        // Add a button to view marks list
        echo '<br><button onclick="window.location.href=\'P.1_Marks_ List\'">View Marks List</button>';
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
