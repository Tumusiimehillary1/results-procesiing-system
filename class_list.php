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
            width: 80%;
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

        .btn-update, .btn-delete {
            padding: 8px;
            margin: 2px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .btn-update {
            background-color: #4CAF50;
            color: white;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
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

    // Handle class deletion if requested
    if (isset($_GET['delete'])) {
        $deleteID = $_GET['delete'];
        $deleteSQL = "DELETE FROM classes WHERE id = $deleteID";
        if ($conn->query($deleteSQL) === TRUE) {
            echo "<p style='color: green;'>Class deleted successfully!</p>";
        } else {
            echo "Error deleting class: " . $conn->error;
        }
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
                    <th>Actions</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["class_name"] . "</td>
                    <td>" . $row["class_code"] . "</td>
                    <td>" . $row["teacher_name"] . "</td>
                    <td>
                        <a href='update_class.php?update=" . $row["id"] . "' class='btn-update'>Update</a>
                        <a href='class_list.php?delete=" . $row["id"] . "' class='btn-delete' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>
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
