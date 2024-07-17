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

    // Retrieve data from the p_1 table
    $sql = "SELECT * FROM p_1 ORDER BY average DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Clear existing data in p_1_report table
        $truncateSql = "TRUNCATE TABLE p_1_report";
        if (!$conn->query($truncateSql)) {
            die("Error truncating table: " . $conn->error);
        }

        // Prepare statement for inserting data into p_1_report table
        $stmt = $conn->prepare("INSERT INTO p_1_report (id, student_name, math, english, sst, science, total, average, position) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("isiiiiidi", $id, $student_name, $math, $english, $sst, $science, $total, $average, $position);

        $position = 1;
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $student_name = $row['student_name'];
            $math = $row['math'];
            $english = $row['english'];
            $sst = $row['sst'];
            $science = $row['science'];
            $total = $row['total'];
            $average = $row['average'];
            $stmt->execute();
            $position++;
        }

        $stmt->close();
        $conn->close();

        echo "Marks list submitted successfully to p_1_report.";
        header("Location: marks_list.php");
        exit();
    } else {
        echo "No records found to submit.";
    }

    // Close database connection
    $conn->close();
} else {
    echo "No data submitted.";
}
?>
