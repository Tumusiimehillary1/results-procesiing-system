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
