<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Teacher</title>
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

        label {
            display: block;
            margin-top: 15px;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 15px;
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
        $teacher_name = $_POST["teacher_name"];
        $subject_taught = $_POST["subject_taught"];
        $residence = $_POST["residence"];
        $email = $_POST["email"];
        $qualification_level = $_POST["qualification_level"];

        $updateSQL = "UPDATE teachersdetails 
                      SET teacher_name='$teacher_name', subject_taught='$subject_taught', 
                          residence='$residence', email='$email', qualification_level='$qualification_level' 
                      WHERE ID=$id";

        if ($conn->query($updateSQL) === TRUE) {
            echo "<p style='color: green;'>Teacher information updated successfully!</p>";
        } else {
            echo "Error updating teacher information: " . $conn->error;
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

                <label for="teacher_name">Name:</label>
                <input type="text" name="teacher_name" value="<?php echo $row['teacher_name']; ?>" required>

                <label for="subject_taught">Subject Taught:</label>
                <input type="text" name="subject_taught" value="<?php echo $row['subject_taught']; ?>" required>

                <label for="residence">Residence:</label>
                <input type="text" name="residence" value="<?php echo $row['residence']; ?>" required>

                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

                <label for="qualification_level">Qualification Level:</label>
                <input type="text" name="qualification_level" value="<?php echo $row['qualification_level']; ?>" required>

                <button type="submit">Update Information</button>
            </form>

            <?php
        } else {
            echo "<p>No teacher found with the provided ID</p>";
        }
    } else {
        echo "<p>Invalid request. Please provide a valid teacher ID</p>";
    }

    $conn->close();
    ?>

    <a href="teacher_list.php">Back to Teacher List</a>
</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Teacher</title>
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

        label {
            display: block;
            margin-top: 15px;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 15px;
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
        $teacher_name = $_POST["teacher_name"];
        $subject_taught = $_POST["subject_taught"];
        $residence = $_POST["residence"];
        $email = $_POST["email"];
        $qualification_level = $_POST["qualification_level"];

        $updateSQL = "UPDATE teachersdetails 
                      SET teacher_name='$teacher_name', subject_taught='$subject_taught', 
                          residence='$residence', email='$email', qualification_level='$qualification_level' 
                      WHERE ID=$id";

        if ($conn->query($updateSQL) === TRUE) {
            echo "<p style='color: green;'>Teacher information updated successfully!</p>";
        } else {
            echo "Error updating teacher information: " . $conn->error;
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

                <label for="teacher_name">Name:</label>
                <input type="text" name="teacher_name" value="<?php echo $row['teacher_name']; ?>" required>

                <label for="subject_taught">Subject Taught:</label>
                <input type="text" name="subject_taught" value="<?php echo $row['subject_taught']; ?>" required>

                <label for="residence">Residence:</label>
                <input type="text" name="residence" value="<?php echo $row['residence']; ?>" required>

                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

                <label for="qualification_level">Qualification Level:</label>
                <input type="text" name="qualification_level" value="<?php echo $row['qualification_level']; ?>" required>

                <button type="submit">Update Information</button>
            </form>

            <?php
        } else {
            echo "<p>No teacher found with the provided ID</p>";
        }
    } else {
        echo "<p>Invalid request. Please provide a valid teacher ID</p>";
    }

    $conn->close();
    ?>

    <a href="teacher_list.php">Back to Teacher List</a>
</div>

</body>
</html>
