<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marks List</title>
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

<h2>Marks List</h2>

<table>
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Math Marks for</th>
            <th>English Marks</th>
            <th>SST Marks</th>
            <th>Science Marks</th>
            <th>Total Marks</th>
            <th>Average Marks</th>
            <th>Position</th>
            <th>Action</th>
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

        // SQL query to fetch marks data from the database, ordered by average marks in descending order
        $sql = "SELECT ID, student_name, math, english, sst, science, total, average 
                FROM marks 
                ORDER BY average DESC";

        // Execute the query
        $result = $conn->query($sql);

        // Initialize position counter
        $position = 1;

        // Check if there are any rows returned
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['ID']}</td>
                        <td>{$row['student_name']}</td>
                        <td>{$row['math']}</td>
                        <td>{$row['english']}</td>
                        <td>{$row['sst']}</td>
                        <td>{$row['science']}</td>
                        <td>{$row['total']}</td>
                        <td>{$row['average']}</td>
                        <td>{$position}</td>
                        <td>
                            <button onclick=\"deleteStudent('{$row['student_name']}')\">Delete</button>
                            <button onclick=\"updateStudent('{$row['ID']}', '{$row['student_name']}', {$row['math']}, {$row['english']}, {$row['sst']}, {$row['science']})\">Update</button>
                            <a href='download_marks.php?ID={$row['ID']}'><img src='download_icon.png' alt='Download' width='20' height='20'></a>
                        </td>
                      </tr>";
                // Increment position counter
                $position++;
            }
        } else {
            echo "<tr><td colspan='10'>No marks found.</td></tr>";
        }

        // Close database connection
        $conn->close();
        ?>
    </tbody>
</table>

<!-- Add the submit button -->
<button onclick="submitMarks()">Submit Marks</button>

<script>
    function deleteStudent(studentName) {
        if (confirm("Are you sure you want to delete the student '" + studentName + "'?")) {
            // Redirect to a PHP script to handle deletion
            window.location.href = "ddelete_student.php?student_name=" + studentName;
        }
    }

    function updateStudent(studentID, studentName, math, english, sst, science) {
        var newStudentName = prompt("Enter new student Name:", studentName);
        if (newStudentName === null) {
            return; // Cancelled
        }
        var newMath = prompt("Enter new Math Marks:", math);
        if (newMath === null) {
            return; // Cancelled
        }
        var newEnglish = prompt("Enter new English Marks:", english);
        if (newEnglish === null) {
            return; // Cancelled
        }
        var newSST = prompt("Enter new SST Marks:", sst);
        if (newSST === null) {
            return; // Cancelled
        }
        var newScience = prompt("Enter new Science Marks:", science);
        if (newScience === null) {
            return; // Cancelled
        }

        // Redirect to a PHP script to handle update
        window.location.href = "upddate.php?ID=" + studentID + "&student_name=" + newStudentName + "&math=" + newMath + "&english=" + newEnglish + "&sst=" + newSST + "&science=" + newScience;
    }

    function submitMarks() {
        // Redirect to process_mmarkkslist.php when the submit button is clicked
        window.location.href = "process_mmarkkslist.php";
    }
</script>

</body>
</html>
