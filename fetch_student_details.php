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

        .print-button, .inquiry-button {
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

        .print-button:hover, .inquiry-button:hover {
            background-color: #0056b3;
        }

        /* Inquiry form styles */
        .inquiry-form {
            display: none;
            margin-top: 20px;
        }

        .inquiry-form input, .inquiry-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .inquiry-form button {
            background-color: #28a745;
        }

        .inquiry-form button:hover {
            background-color: #218838;
        }
    </style>
    <script>
        function toggleInquiryForm() {
            var form = document.getElementById("inquiry-form");
            form.style.display = form.style.display === "none" ? "block" : "none";
        }
    </script>
</head>
<body>
    <div class="student-details-container">
        <?php
        session_start();

        if (!isset($_SESSION["username"])) {
            header("Location: login.php");
            exit();
        }

        $username = $_SESSION["username"];

        $mysqli = new mysqli("localhost", "root", "", "imperial");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $tables = ['p_1_report', 'p_2_report', 'p_3_report', 'p_4_report', 'p_5_report', 'p_6_report', 'p_7_report'];
        $student_details = null;

        foreach ($tables as $table) {
            $sql = "SELECT * FROM $table WHERE student_name = ?";
            $stmt = $mysqli->prepare($sql);

            if ($stmt === false) {
                error_log("Failed to prepare statement for table $table: " . $mysqli->error);
                continue;
            }

            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $student_details = $result->fetch_assoc();
                break;
            }
        }

        if ($student_details) {
            echo "<h2>Student Details</h2>";
            echo "<p><span class='details-label'>Student ID:</span> <span class='details-value'>" . htmlspecialchars($student_details['id']) . "</span></p>";
            echo "<p><span class='details-label'>Name:</span> <span class='details-value'>" . htmlspecialchars($student_details['student_name']) . "</span></p>";
            echo "<h2>VIEW YOUR RESULTS/REPORT BELOW</h2>";
            echo "<p><span class='details-label'>Math Marks:</span> <span class='details-value'>" . htmlspecialchars($student_details['math']) . "</span></p>";
            echo "<p><span class='details-label'>English Marks:</span> <span class='details-value'>" . htmlspecialchars($student_details['english']) . "</span></p>";
            echo "<p><span class='details-label'>SST Marks:</span> <span class='details-value'>" . htmlspecialchars($student_details['sst']) . "</span></p>";
            echo "<p><span class='details-label'>Science Marks:</span> <span class='details-value'>" . htmlspecialchars($student_details['science']) . "</span></p>";
            echo "<p><span class='details-label'>Total Marks:</span> <span class='details-value'>" . htmlspecialchars($student_details['total']) . "</span></p>";
            echo "<p><span class='details-label'>Average Marks:</span> <span class='details-value'>" . htmlspecialchars($student_details['average']) . "</span></p>";
            echo "<p><span class='details-label'>Position:</span> <span class='details-value'>" . htmlspecialchars($student_details['position']) . "</span></p>";

            echo "<form action='download_student_details.php' method='post'>";
            echo "<input type='hidden' name='student_id' value='" . htmlspecialchars($student_details['id']) . "'>";
            echo "<button type='submit' name='download'>Download Details</button>";
            echo "</form>";

            echo "<form action='print_student_details.php' method='post'>";
            echo "<input type='hidden' name='student_id' value='" . htmlspecialchars($student_details['id']) . "'>";
            echo "<input type='hidden' name='student_name' value='" . htmlspecialchars($student_details['student_name']) . "'>";
            echo "<button type='submit' name='print' class='print-button'>Print Details</button>";
            echo "</form>";

            // Inquiry button
            echo "<button class='inquiry-button' onclick='toggleInquiryForm()'>Submit Inquiry</button>";

            // Inquiry form
            echo "<form id='inquiry-form' class='inquiry-form' action='submit_inquiry.php' method='post'>";
            echo "<input type='hidden' name='student_id' value='" . htmlspecialchars($student_details['id']) . "'>";
            echo "<input type='hidden' name='student_name' value='" . htmlspecialchars($student_details['student_name']) . "'>";
            echo "<input type='text' name='inquirer_name' placeholder='Your Name' required>";
            echo "<input type='email' name='inquirer_email' placeholder='Your Email' required>";
            echo "<textarea name='inquiry_message' placeholder='Your Inquiry' required></textarea>";
            echo "<button type='submit' class='inquiry-button'>Submit Inquiry</button>";
            echo "</form>";
        } else {
            echo "<h2>Student not found.</h2>";
            echo "<p>Debugging Info: Checked tables: " . implode(", ", $tables) . " for username: " . htmlspecialchars($username) . "</p>";
        }

        if ($stmt) {
            $stmt->close();
        }
        $mysqli->close();
        ?>
        <div class="back-link">
            <p><a href="login.php">Logout</a></p>
        </div>
    </div>
</body>
</html>
