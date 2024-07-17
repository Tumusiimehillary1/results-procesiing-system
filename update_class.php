<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Class</title>
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
            border-radius: 8px;
        }

        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
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

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Update Class</h2>

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

    // Initialize variables for class details
    $classID = $_GET['update'] ?? '';
    $className = $classCode = $teacherName = '';

    // Retrieve class details based on ID
    if (!empty($classID)) {
        $result = $conn->query("SELECT * FROM classes WHERE id = $classID");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $className = $row["class_name"];
            $classCode = $row["class_code"];
            $teacherName = $row["teacher_name"];
        } else {
            echo "<p>No class found with the specified ID</p>";
        }
    } else {
        echo "<p>Invalid request, please provide a class ID for updating</p>";
    }

    // Handle class update if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $class_name = $_POST["class_name"];
        $class_code = $_POST["class_code"];
        $teacher_name = $_POST["teacher_name"];

        // Update data in the 'classes' table
        $updateSQL = "UPDATE classes SET class_name = '$class_name', class_code = '$class_code', teacher_name = '$teacher_name' WHERE id = $classID";

        if ($conn->query($updateSQL) === TRUE) {
            echo "<p style='color: green;'>Class updated successfully!</p>";
            echo "<script>window.location.href = 'class_list.php';</script>"; // Redirect to class list page
            exit();
        } else {
            echo "Error updating class: " . $conn->error;
        }
    }

    $conn->close();
    ?>

    <form method="post" action="">
        <label for="class_name">Class Name:</label>
        <input type="text" id="class_name" name="class_name" value="<?php echo $className; ?>" required>

        <label for="class_code">Class Code:</label>
        <input type="text" id="class_code" name="class_code" value="<?php echo $classCode; ?>" required>

        <label for="teacher_name">Teacher's Name:</label>
        <input type="text" id="teacher_name" name="teacher_name" value="<?php echo $teacherName; ?>" required>

        <input type="submit" class="btn" value="Update Class">
    </form>

    <a href="class_list.php" class="btn">Back to Class List</a>
</div>

</body>
</html>
