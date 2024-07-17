<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Report List</h2>

<table>
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Math Marks</th>
            <th>English Marks</th>
            <th>SST Marks</th>
            <th>Science Marks</th>
            <th>Total Marks</th>
            <th>Average Marks</th>
            <th>Position</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "imperial"; // Replace 'imperial' with your actual database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to fetch data from the 'report' table
        $sql = "SELECT * FROM report";

        // Execute the query
        $result = $conn->query($sql);

        // Check if there are any rows returned
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['StudentID']}</td>
                        <td>{$row['StudentName']}</td>
                        <td>{$row['MathMarks']}</td>
                        <td>{$row['EnglishMarks']}</td>
                        <td>{$row['SSTMarks']}</td>
                        <td>{$row['ScienceMarks']}</td>
                        <td>{$row['TotalMarks']}</td>
                        <td>{$row['AverageMarks']}</td>
                        <td>{$row['Position']}</td>
                        <td>
                            <form action='download_student.php' method='post'>
                                <input type='hidden' name='student_id' value='{$row['StudentID']}'>
                                <button type='submit' name='download'>Download</button>
                            </form>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No data found.</td></tr>";
        }

        // Close database connection
        $conn->close();
        ?>
    </tbody>
</table>

</body>
</html>
