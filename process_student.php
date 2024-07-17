<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            text-align: center;
        }

        h2 {
            color: #4CAF50;
        }

        p {
            color: #008CBA;
            font-size: 18px;
            margin-bottom: 20px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Student Registration</h2>

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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $birth = $_POST['birth'];
        $gender = $_POST['gender'];
        $subjects = $_POST['subjects'];
        $class = $_POST['class'];

        // Escape variables for security
        $first_name = mysqli_real_escape_string($conn, $first_name);
        $last_name = mysqli_real_escape_string($conn, $last_name);
        $email = mysqli_real_escape_string($conn, $email);
        $birth = mysqli_real_escape_string($conn, $birth);
        $gender = mysqli_real_escape_string($conn, $gender);
        $subjects = mysqli_real_escape_string($conn, $subjects);
        $class = mysqli_real_escape_string($conn, $class);

        // Prepare SQL statement to insert data into the selected table
        $sql = "INSERT INTO students (First_Name, Last_Name, Email, Date_of_Birth, Gender, Subjects, Class) 
                VALUES ('$first_name', '$last_name', '$email', '$birth', '$gender', '$subjects', '$class')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            echo '<a href="student_list.php"><button>View Registered Students</button></a>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
?>

</div>

</body>
</html>
