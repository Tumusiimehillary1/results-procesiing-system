<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Subject Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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
    </style>
</head>
<body>

    <?php
    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password ="";
    $database = "imperial";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Initialize variables
    $subject_code = $subject_name = $subject_teacher = '';

    // Fetch subject information for the selected subject_code
    if (isset($_GET["id"])) {
        $subject_code = $_GET["id"];
        $select_sql = "SELECT * FROM subjects WHERE subject_code = $subject_code";
        $result = $conn->query($select_sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Handle form submission
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $subject_name = $_POST["subject_name"];
                $subject_teacher = $_POST["subject_teacher"];

                // Update subject information in the database
                $update_sql = "UPDATE subjects SET
                    subject_name = '$subject_name',
                    subject_teacher = '$subject_teacher'
                    WHERE subject_code = $subject_code";

                if ($conn->query($update_sql) === TRUE) {
                    echo "<p>Subject information updated successfully.</p>";
                    echo "<a href='viewsubject.php'><button type='button'>Back to Subject List</button></a>";
                } else {
                    echo "Error updating subject information: " . $conn->error;
                }
            }

            // Display the update form with pre-filled values
            echo "<form action='update_subject.php?id=$subject_code' method='post'>
                    <h2>Update Subject Information</h2>

                    <label for='subject_name'>Subject Name:</label>
                    <input type='text' id='subject_name' name='subject_name' value='" . $row['subject_name'] . "' required>

                    <label for='subject_teacher'>Subject Teacher:</label>
                    <input type='text' id='subject_teacher' name='subject_teacher' value='" . $row['subject_teacher'] . "' required>

                    <button type='submit'>Update</button>
                </form>";
        } else {
            echo "<p>Subject not found.</p>";
        }
    }

    // Close the database connection
    $conn->close();
    ?>

</body>
</html>
