<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Registered Students</title>
    <style>
        /* Your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        form {
            display: inline;
            margin-right: 5px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h2>View Registered Students</h2>

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

        // Handle delete request
        if (isset($_POST['delete']) && isset($_POST['student_id'])) {
            $delete_id = $_POST['student_id'];
            $delete_sql = "DELETE FROM students WHERE id = $delete_id";
            $conn->query($delete_sql);
        }

        // Fetch registered students from the database
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Subjects</th>
                        <th>Action</th>
                    </tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['first_name'] . "</td>
                        <td>" . $row['last_name'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['Date_of_Birth'] . "</td>
                        <td>" . $row['gender'] . "</td>
                        <td>" . $row['Subjects'] . "</td>
                        <td>
                            <form method='post'>
                                <input type='hidden' name='student_id' value='" . $row['id'] . "'>
                                <button type='submit' name='delete'>Delete</button>
                            </form>
                            <a href='update_student.php?id=" . $row['id'] . "'><button>Update</button></a>
                        </td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "No registered students.";
        }

        // Close the database connection
        $conn->close();
    ?>
    <a href="indexx.php" class="back-button">Back to Home</a>
    <div class="card-container">
      <div class="card" style="background-color: #3498db;"> <!-- Blue -->
    

</body>
</html>
