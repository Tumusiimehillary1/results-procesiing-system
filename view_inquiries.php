<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "imperial");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch inquiries
$sql = "SELECT * FROM inquiries";
$result = $mysqli->query($sql);

// Check if there are any inquiries
if ($result->num_rows > 0) {
    $inquiries = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $inquiries = [];
}

$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Inquiries</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 900px;
        margin: auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 24px;
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .back-button {
        display: block;
        width: 100px;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        text-align: center;
        border-radius: 5px;
        text-decoration: none;
        margin: auto;
    }

    .back-button:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
<div class="container">
    <h1>Student Inquiries</h1>
    <?php if (count($inquiries) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Inquiry ID</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Inquirer Name</th>
                    <th>Inquirer Email</th>
                    <th>Inquiry Message</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inquiries as $inquiry): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($inquiry['id']); ?></td>
                        <td><?php echo htmlspecialchars($inquiry['student_id']); ?></td>
                        <td><?php echo htmlspecialchars($inquiry['student_name']); ?></td>
                        <td><?php echo htmlspecialchars($inquiry['inquirer_name']); ?></td>
                        <td><?php echo htmlspecialchars($inquiry['inquirer_email']); ?></td>
                        <td><?php echo htmlspecialchars($inquiry['inquiry_message']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No inquiries found.</p>
    <?php endif; ?>
    <a href="select_class.php" class="back-button">Back to Dashboard</a>
</div>
</body>
</html>
