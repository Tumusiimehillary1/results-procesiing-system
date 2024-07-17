<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Information</title>
    <style>
        /* Your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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
    </style>
</head>
<body>

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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST["student_id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $dob = $_POST["birth"]; // Corrected from "Date_of_Birth"
    $gender = $_POST["gender"];
    $subjects = $_POST["subjects"]; // Corrected from "Subjects"

    // Update student information in the database
    $update_sql = "UPDATE students SET
                first_name = '$first_name',
                last_name = '$last_name',
                email = '$email',
                Date_of_Birth = '$dob',
                gender = '$gender',
                Subjects = '$subjects'
                WHERE id = $student_id";

    if ($conn->query($update_sql) === TRUE) {
        echo "<p>Student information updated successfully.</p>";
        echo "<a href='student_list.php'><button type='button'>Back to Student List</button></a>";
    } else {
        echo "Error updating student information: " . $conn->error;
    }
}

// Fetch student information for the selected student_id
if (isset($_GET["id"])) {
    $student_id = $_GET["id"];
    $select_sql = "SELECT * FROM students WHERE id = $student_id";
    $result = $conn->query($select_sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display the update form with pre-filled values
        echo "<form action='update_student.php' method='post'>
                        <h2>Update Student Information</h2>
                        <input type='hidden' name='student_id' value='" . $row['id'] . "'>

                        <label for='first_name'>First Name:</label>
                        <input type='text' id='first_name' name='first_name' value='" . $row['first_name'] . "' required>

                        <label for='last_name'>Last Name:</label>
                        <input type='text' id='last_name' name='last_name' value='" . $row['last_name'] . "' required>

                        <label for='email'>Email:</label>
                        <input type='email' id='email' name='email' value='" . $row['email'] . "' required>

                        <label for='dob'>Date of Birth:</label>
                        <input type='date' id='Date_of_Birth' name='birth' value='" . $row['Date_of_Birth'] . "' required>

                        <label for='gender'>Gender:</label>
                        <select id='gender' name='gender' required>
                            <option value='male' " . ($row['gender'] == 'male' ? 'selected' : '') . ">Male</option>
                            <option value='female' " . ($row['gender'] == 'female' ? 'selected' : '') . ">Female</option>
                            <option value='other' " . ($row['gender'] == 'other' ? 'selected' : '') . ">Other</option>
                        </select>

                        <label for='subjects'>Subjects:</label>
                        <input type='text' id='Subjects' name='subjects' value='" . $row['Subjects'] . "' required>

                        <button type='submit'>Update</button>
                    </form>";
    } else {
        echo "<p>Student not found.</p>";
    }
}

// Close the database connection
$conn->close();
?>

</body>
</html>
