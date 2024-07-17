<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .student-details-container {
            max-width: 600px;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333333;
        }

        p {
            margin-bottom: 10px;
            color: #555555;
        }

        .details-label {
            font-weight: bold;
        }

        .details-value {
            color: #007bff;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
        }

        .back-link a:hover {
            color: #0056b3;
        }

        /* Style for print button */
        .print-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
            width: 100%;
        }

        .print-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="student-details-container">
        <?php
        // Start the session
        session_start();

        // Check if user is logged in
        if (!isset($_SESSION["username"])) {
            // Redirect to login page if not logged in
            header("Location: login.php");
            exit();
        }

        // Retrieve username from session
        $username = $_SESSION["username"];

        // Connect to the database (change the connection parameters as needed)
        $mysqli = new mysqli("localhost", "root", "", "imperial");

        // Check connection
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        // Query to fetch student details based on username
        $sql = "SELECT * FROM report, p1_report WHERE StudentName = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Student found, display their details
            $student_details = $result->fetch_assoc();
            echo "<h2>Student Details</h2>";
            echo "<p><span class='details-label'>Student ID:</span> <span class='details-value'>" . $student_details['StudentID'] . "</span></p>";
            echo "<p><span class='details-label'>Name:</span> <span class='details-value'>" . $student_details['StudentName'] . "</span></p>";
            echo "<p><span class='details-label'>Math Marks:</span> <span class='details-value'>" . $student_details['MathMarks'] . "</span></p>";
            echo "<p><span class='details-label'>English Marks:</span> <span class='details-value'>" . $student_details['EnglishMarks'] . "</span></p>";
            echo "<p><span class='details-label'>SST Marks:</span> <span class='details-value'>" . $student_details['SSTMarks'] . "</span></p>";
            echo "<p><span class='details-label'>Science Marks:</span> <span class='details-value'>" . $student_details['ScienceMarks'] . "</span></p>";
            echo "<p><span class='details-label'>Total Marks:</span> <span class='details-value'>" . $student_details['TotalMarks'] . "</span></p>";
            echo "<p><span class='details-label'>Average Marks:</span> <span class='details-value'>" . $student_details['AverageMarks'] . "</span></p>";
            echo "<p><span class='details-label'>Position:</span> <span class='details-value'>" . $student_details['Position'] . "</span></p>";
            // Download button
            echo "<form action='download_student_details.php' method='post'>";
            echo "<input type='hidden' name='student_id' value='" . $student_details['StudentID'] . "'>";
            echo "<button type='submit' name='download'>Download Details</button>";
            echo "</form>";
        
            // Print button
            echo "<form action='print_student_details.php' method='post'>";
            echo "<input type='hidden' name='student_id' value='" . $student_details['StudentID'] . "'>";
            echo "<button type='submit' name='print' class='print-button'>Print Details</button>";
            echo "</form>"; // Added missing semicolon here
        } 
        else {
            // Student not found
            echo "<h2>Student not found.</h2>";
        }

        // Close statement and connection
        $stmt->close();
        $mysqli->close();
        ?>
        <div class="back-link">
    <p><a href="login.php">Logout</a></p>
</div>

    </div>
</body>
</html>
