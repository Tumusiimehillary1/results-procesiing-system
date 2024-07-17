<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            border-radius: 8px;
        }

        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            margin-top: 20px;
            border-radius: 5px;
            font-size: 18px;
        }

        .view-btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            margin-top: 20px;
            border-radius: 5px;
            font-size: 18px;
            margin-left: 10px;
        }

        .success-message {
            color: #4CAF50;
            font-size: 24px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Subject Registration</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $subject_code = $_POST["subject_code"];
        $subject_name = $_POST["subject_name"];
        $subject_teacher = $_POST["subject_teacher"];

        // Validate input (you can add more validation as needed)
        if (empty($subject_code) || empty($subject_name) || empty($subject_teacher)) {
            die("All fields are required");
        }

        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "imperial";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert data into the 'subjects' table
        $sql = "INSERT INTO subjects (subject_code, subject_name, subject_teacher) 
                VALUES ('$subject_code', '$subject_name', '$subject_teacher')";

        if ($conn->query($sql) === TRUE) {
            echo "<p class='success-message'>Subject registered successfully</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    } else {
        // Handle the form in case of a GET request or other method
        echo "Invalid request method";
    }
    ?>

    <a href="view_subjects.php" class="view-btn">View Registered Subjects</a>
</div>

</body>
</html>
