<?php
// Check if the ID is set in the URL
if (isset($_GET['id'])) {
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

    // Retrieve the existing record
    $stmt = $conn->prepare("SELECT * FROM p_7 WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found.";
        exit();
    }

    // Close statement
    $stmt->close();
} else {
    echo "No ID provided.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Marks</title>
    <style>
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

        input[type="text"],
        input[type="number"] {
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

<form action="Update_p_7.php" method="post">
    <h2>Update Marks for a P.7 Student</h2>

    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label for="student_name">Student Name:</label>
    <input type="text" id="student_name" name="student_name" value="<?php echo $row['student_name']; ?>" required>

    <label for="math">Math Marks:</label>
    <input type="number" id="math" name="math" value="<?php echo $row['math']; ?>" required>

    <label for="english">English Marks:</label>
    <input type="number" id="english" name="english" value="<?php echo $row['english']; ?>" required>

    <label for="sst">SST Marks:</label>
    <input type="number" id="sst" name="sst" value="<?php echo $row['sst']; ?>" required>

    <label for="science">Science Marks:</label>
    <input type="number" id="science" name="science" value="<?php echo $row['science']; ?>" required>

    <button type="submit">Update Marks</button>
</form>

</body>
</html>
