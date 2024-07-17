<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject list</title>
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
    <h2>Subject List</h2>

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
        $deletesubject_code = $_GET['delete'];
        $deleteSQL = "DELETE FROM subjects WHERE subject_code = $deletesubject_code";
        if ($conn->query($deleteSQL) === TRUE) {
            echo "<p style='color: green;'>Subject deleted successfully!</p>";
        } else {
            echo "Error deleting subject: " . $conn->error;
        }
    }

    // Retrieve and display teacher details
    $result = $conn->query("SELECT * FROM subjects");

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>subject_code</th>
                    <th>subject_name</th>
                    <th>subject_teacher</th>
                    <th>Actions</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["subject_code"] . "</td>
                    <td>" . $row["subject_name"] . "</td>
                    <td>" . $row["subject_teacher"] . "</td>
                    <td>
                        <a href='viewsubject.php?delete=" . $row["subject_code"] . "' class='btn btn-danger'>Delete</a>
                        <a href='update_subject.php?id=" . $row["subject_code"] . "' class='btn'>Update</a>
                    </td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No subjects found</p>";
    }

    $conn->close();
    ?>

    <a href="subject.php" class="btn">Add subject</a>
</div>

</body>
</html>
