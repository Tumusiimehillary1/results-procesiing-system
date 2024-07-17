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

        form {
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            margin-top: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Subject Registration</h2>

    <form method="post" action="process_subject.php">
        <label for="subject_code">Subject Code:</label>
        <input type="text" id="subject_code" name="subject_code" required>

        <label for="subject_name">Subject Name:</label>
        <input type="text" id="subject_name" name="subject_name" required>

        <label for="subject_teacher">Subject Teacher:</label>
        <select id="subject_teacher" name="subject_teacher" required>
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

            // Retrieve teachers from the database
            $result = $conn->query("SELECT * FROM teachersdetails");

            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['teacher_name'] . "'>" . $row['teacher_name'] . "</option>";
            }

            // Close the connection
            $conn->close();
            ?>
        </select>

        <input type="submit" class="btn" value="Register Subject">
    </form>
</div>

</body>
</html>
