<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Classes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            margin-bottom: 10px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>SELECT A CLASS TO INPUT MARKS</h2>

<table>
    <thead>
        <tr>
            <th>Class Name</th>
            <th>Class Code</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "imperial";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to fetch classes from the database
        $sql = "SELECT class_name, class_code FROM classes";
        $result = $conn->query($sql);

        // Display classes in a table
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["class_name"] . "</td><td>" . $row["class_code"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No classes found</td></tr>";
        }

        $conn->close();
        ?>
    </tbody>
</table>

</body>
</html>
