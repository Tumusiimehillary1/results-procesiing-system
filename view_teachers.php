<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h2 {
            color: #4CAF50;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Teachers List</h2>

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

    // Display the list of teachers
    if ($result = $conn->query("SELECT * FROM teachersdetails")) {
        if ($result->num_rows > 0) {
            echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Subject Taught</th>
                    <th>Residence</th>
                    <th>Email</th>
                    <th>Qualification Level</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["ID"] . "</td>
                    <td>" . $row["teacher_name"] . "</td>
                    <td>" . $row["subject_taught"] . "</td>
                    <td>" . $row["residence"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["qualification_level"] . "</td>
                </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No results found</p>";
        }

        $result->free();
    } else {
        echo "<p>Error retrieving data</p>";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
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

        .btn-danger {
            background-color: #ff5555;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Teacher List</h2>

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

    // Handle deletion if requested
    if (isset($_GET['delete'])) {
        $deleteID = $_GET['delete'];
        $deleteSQL = "DELETE FROM teachersdetails WHERE ID = $deleteID";
        if ($conn->query($deleteSQL) === TRUE) {
            echo "<p style='color: green;'>Teacher deleted successfully!</p>";
        } else {
            echo "Error deleting teacher: " . $conn->error;
        }
    }

    // Retrieve and display teacher details
    $result = $conn->query("SELECT * FROM teachersdetails");

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Subject Taught</th>
                    <th>Residence</th>
                    <th>Email</th>
                    <th>Qualification Level</th>
                    <th>Actions</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["ID"] . "</td>
                    <td>" . $row["teacher_name"] . "</td>
                    <td>" . $row["subject_taught"] . "</td>
                    <td>" . $row["residence"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["qualification_level"] . "</td>
                    <td>
                        <a href='teacher_list.php?delete=" . $row["ID"] . "' class='btn btn-danger'>Delete</a>
                        <a href='update_teacher.php?id=" . $row["ID"] . "' class='btn'>Update</a>
                    </td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No teachers found</p>";
    }

    $conn->close();
    ?>

    <a href="teacher.php" class="btn">Add Teacher</a>
</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Classes</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
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
    <h2>Registered Classes</h2>

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

    // Retrieve and display class details
    $result = $conn->query("SELECT * FROM classes");

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Class Name</th>
                    <th>Class Code</th>
                    <th>Teacher's Name</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["class_name"] . "</td>
                    <td>" . $row["class_code"] . "</td>
                    <td>" . $row["teacher_name"] . "</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No classes found</p>";
    }

    $conn->close();
    ?>

    <a href="class_registration.php" class="btn">Register New Class</a>
</div>

</body>
</html>
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
if ($conn->query($updateSQL) === TRUE) {
            echo "<p class='success-message'>Class updated successfully!</p>";
            echo "<script>window.location.href = 'class_list.php';</script>"; // Redirect to class list page
                        exit();
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
