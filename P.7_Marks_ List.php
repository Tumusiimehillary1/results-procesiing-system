<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P.7 Marks List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }
        .navigation-buttons{
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            width: 10%;
            padding: auto;
        }
    </style>
</head>
<body>

<h2>P.7 Marks List</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Math</th>
            <th>English</th>
            <th>SST</th>
            <th>Science</th>
            <th>Total</th>
            <th>Average</th>
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

        // Retrieve data from the p_1 table and sort by average descending
        $sql = "SELECT * FROM p_7 ORDER BY average DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $position = 1;
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                         <td>{$row['id']}</td>
                        <td>{$row['student_name']}</td>
                        <td>{$row['math']}</td>
                        <td>{$row['english']}</td>
                        <td>{$row['sst']}</td>
                        <td>{$row['science']}</td>
                        <td>{$row['total']}</td>
                        <td>{$row['average']}</td>
                        <td>{$position}</td>
                        <td class='action-buttons'>
                            <a href='delet_p_7.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
                            <a href='Updatep_7_form.php?id={$row['id']}'>Update</a>
                        </td>
                      </tr>";
                $position++;
            }
        } else {
            echo "<tr><td colspan='10'>No records found</td></tr>";
        }

        // Close database connection
        $conn->close();
        ?>
    </tbody>
</table>

<!-- Form to submit the marks list to p_1_report table -->
<form action="submit_p7_report.php" method="post">
    <button type="submit">Submit Marks List to Report</button>
</form>
<div class="navigation-buttons">
<a href="select_class.php">
<button type="submit">BACK TO HOME</button></a>
</div>
</body>
</html>
