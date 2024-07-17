<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            text-align: center;
        }

        h2 {
            color: #4CAF50;
        }

        p {
            color: #008CBA;
            font-size: 18px;
            margin-bottom: 20px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Teacher Registration</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $teacher_name = $_POST["teacher_name"];
        $subject_taught = $_POST["subject_taught"];
        $residence = $_POST["residence"];
        $email = $_POST["email"];
        $qualification_level = $_POST["qualification_level"];

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

        // Insert data into the 'teachers' table
        $sql = "INSERT INTO teachersdetails (teacher_name, subject_taught, residence, email, qualification_level) 
                VALUES ('$teacher_name', '$subject_taught', '$residence', '$email', '$qualification_level')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Teacher registered successfully</p>";
        } else {
            echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }

        // Close the database connection
        $conn->close();

        // Provide a button to view registered teachers
        echo '<a href="teacher_list.php"><button>View Registered Teachers</button></a>';
    } else {
        // Handle the form in case of a GET request or other method
        echo "<p>Invalid request method</p>";
    }
    ?>
</div>

</body>
</html>
