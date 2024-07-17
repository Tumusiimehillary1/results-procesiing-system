<?php
// Start the session (this should be at the very beginning of the script)
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $user_type = $_POST["user_type"];

    // Connect to the database (change the connection parameters as needed)
    $mysqli = new mysqli("localhost", "root", "", "imperial");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare SQL statement to retrieve user data
    $sql = "SELECT * FROM users WHERE username = ? AND user_type = ?";
    
    // Prepare and bind parameters
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $username, $user_type);

    // Execute the statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if user exists and password is correct
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Password is correct, redirect to indexx.php
            $_SESSION["username"] = $username; // Store username in session for future use
            header("Location: indexx.php");
            exit();
        } else {
            // Password is incorrect
            echo "Incorrect password!";
        }
    } else {
        // User does not exist
        echo "User not found!";
    }

    // Close statement and connection
    $stmt->close();
    $mysqli->close();
} else {
    // Redirect back to login page if accessed directly
    header("Location: login.php");
    exit();
}
?>
