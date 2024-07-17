<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Teacher</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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

        label {
            display: block;
            margin-top: 15px;
            font-size: 30px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 15px;
            box-sizing: border-box;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 30px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 30px;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            margin-top: 20px;
            color: #4CAF50;
            text-decoration: none;
            font-size: 30px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Update Teacher Information</h2>

    <?php
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

    // Handle form submission for updating teacher information
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $teacher_name = $_POST["teacher_name_update"];
        $subject_taught = $_POST["subject_taught_update"];
        $residence = $_POST["residence_update"];
        $email = $_POST["email_update"];
        $qualification_level = $_POST["qualification_level_update"];

        $updateSQL = "UPDATE teachersdetails 
                      SET teacher_name='$teacher_name', subject_taught='$subject_taught', 
                          residence='$residence', email='$email', qualification_level='$qualification_level' 
                      WHERE ID=$id";

        if ($conn->query($updateSQL) === TRUE) {
            echo "<p style='color: green;'>Teacher information updated successfully!</p>";
        } else {
            echo "<p style='color: red;'>Error updating teacher information: " . $conn->error . "</p>";
        }
    }

    // Retrieve teacher details based on the provided ID
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM teachersdetails WHERE ID=$id");

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>

            <form action="update_teacher.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">

                <label for="teacher_name_update">Name:</label>
                <input type="text" name="teacher_name_update" value="<?php echo $row['teacher_name']; ?>" required>

                <label for="subject_taught_update">Subject Taught:</label>
                <input type="text" name="subject_taught_update" value="<?php echo $row['subject_taught']; ?>" required>

                <label for="residence_update">Residence:</label>
                <input type="text" name="residence_update" value="<?php echo $row['residence']; ?>" required>

                <label for="email_update">Email:</label>
                <input type="email" name="email_update" value="<?php echo $row['email']; ?>" required>

                <label for="qualification_level_update">Qualification Level:</label>
                <input type="text" name="qualification_level_update" value="<?php echo $row['qualification_level']; ?>" required>

                <button type="submit">Update Information</button>
            </form>

            <?php
        } else {
            echo "<p>No teacher found with the provided ID</p>";
        }
    } 

    $conn->close();
    ?>

    <a href="teacher_list.php">Back to Teacher List</a>
</div>

</body>
</html>
