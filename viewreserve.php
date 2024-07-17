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
