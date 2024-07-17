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
    $id = intval($_POST['id']);
    $student_name = $_POST['student_name'];
    $math = intval($_POST['math']);
    $english = intval($_POST['english']);
    $sst = intval($_POST['sst']);
    $science = intval($_POST['science']);

    // Calculate total and average
    $total = $math + $english + $sst + $science;
    $average = $total / 4;

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("UPDATE p_5 SET student_name = ?, math = ?, english = ?, sst = ?, science = ?, total = ?, average = ? WHERE id = ?");
    $stmt->bind_param("siiiiidi", $student_name, $math, $english, $sst, $science, $total, $average, $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect back to the marks list
    header("Location: P.5_Marks_ List.php");
    exit();
} else {
    echo "No data submitted.";
}
?>
