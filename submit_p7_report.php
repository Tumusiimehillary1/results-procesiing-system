<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>title</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        .navigation-buttons {
            margin-bottom: 20px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="navigation-buttons">
<a href="P.7_Marks_ List.php">
<button type="submit">BACK TO MARKS LIST</button></a>
</div>

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

    // Retrieve data from the p_1 table and sort by average descending
    $sql = "SELECT * FROM p_7 ORDER BY average DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Clear existing data in p_1_report table
        $truncateSql = "TRUNCATE TABLE p_4_report";
        if (!$conn->query($truncateSql)) {
            die("Error truncating table: " . $conn->error);
        }

        // Prepare statement for inserting data into p_1_report table
        $stmt = $conn->prepare("INSERT INTO p_7_report (student_name, math, english, sst, science, total, average, position) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("siiiiidi", $student_name, $math, $english, $sst, $science, $total, $average, $position);

        $position = 1;
        while ($row = $result->fetch_assoc()) {
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

        echo "Marks list submitted successfully to p_7_report.";
        
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

</body>
</html>
