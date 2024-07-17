<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
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

        input, select {
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

    <form action="process_student.php" method="post">
        <h2>Student Registration Form</h2>
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="birth">Date of Birth:</label>
        <input type="birth" id="birth" name="birth" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>

        <label for="subjects">Subjects:</label>
        <select id="subjects" name="subjects" required>
            <?php
                // Replace these values with your actual database connection details
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

                // Fetch subjects from the database
                $sql = "SELECT subject_name FROM subjects";
                $result = $conn->query($sql);

                // Populate the dropdown with subjects
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['subject_name'] . "'>" . $row['subject_name'] . "</option>";
                }

                // Close the database connection
                $conn->close();
            ?>
        </select>

        <label for="class">Class:</label>
        <select id="class" name="class" required>
            <?php
                // Replace these values with your actual database connection details
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

                // Fetch classes from the database
                $sql = "SELECT class_name FROM classes";
                $result = $conn->query($sql);

                // Populate the dropdown with classes
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['class_name'] . "'>" . $row['class_name'] . "</option>";
                }

                // Close the database connection
                $conn->close();
            ?>
        </select>

        <input type="submit" value="Register">
    </form>

</body>
</html>
