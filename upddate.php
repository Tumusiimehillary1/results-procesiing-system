<?php
// Check if the necessary parameters are received
if (isset($_GET['ID']) && isset($_GET['student_name']) && isset($_GET['math']) && isset($_GET['english']) && isset($_GET['sst']) && isset($_GET['science'])) {
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

    // Prepare the SQL statement to update student marks
    $stmt = $conn->prepare("UPDATE marks SET student_name=?, math=?, english=?, sst=?, science=?, total=?, average=? WHERE ID=?");
    if (!$stmt) {
        die("Failed to prepare statement: " . $conn->error);
    }

    // Calculate total and average marks
    $math = $_GET['math'];
    $english = $_GET['english'];
    $sst = $_GET['sst'];
    $science = $_GET['science'];
    $total = $math + $english + $sst + $science;
    $average = $total / 4;

    // Bind parameters to the SQL statement
    $stmt->bind_param("siiiiids", $_GET['student_name'], $math, $english, $sst, $science, $total, $average, $_GET['ID']);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Student details updated successfully";

        // Close statement
        $stmt->close();
        
        // Add button to go to updated marks list
        echo '<button onclick="window.location.href=\'marks_listt.php\'">Go to Updated Marks List</button>';
    } else {
        echo "Error updating student details: " . $stmt->error;
    }

    // Close database connection
    $conn->close();
} else {
    echo "Invalid parameters provided.";
}
?>
