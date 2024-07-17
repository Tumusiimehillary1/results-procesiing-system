<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $teacher_name = $_POST["teacher_name"];
    $subject_taught = $_POST["subject_taught"];
    $residence = $_POST["residence"];
    $email = $_POST["email"];
    $qualification_level = $_POST["qualification_level"];

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

    // Insert data into the 'teachers' table
    $sql = "INSERT INTO teachersdetails (teacher_name, subject_taught, residence, email, qualification_level) 
            VALUES ('$teacher_name', '$subject_taught', '$residence', '$email', '$qualification_level')";

    if ($conn->query($sql) === TRUE) {
        echo "Teacher registered successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();

    // Provide a button to view registered teachers
    echo '<a href="view_teachers.php"><button>View Registered Teachers</button></a>';
} else {
    // Handle the form in case of a GET request or other method
    echo "Invalid request method";
}

?>
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

// Display the list of teachers
echo "<h2>Teachers List</h2>";

$result = $conn->query("SELECT * FROM teachersdetails");

if ($result->num_rows > 0) {
    echo "<table border='1'>
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
    echo "0 results";
}

$conn->close();

?>
