<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $user_type = $_POST["user_type"];

    // Validate input (you can add more validation if needed)
    if (empty($username) || empty($password) || empty($user_type)) {
        // Redirect back to registration page with error message
        header("Location: register.php?error=emptyfields");
        exit();
    } else {
        // Perform additional validation if necessary

        // Hash the password (for better security, you should use a stronger hashing algorithm)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Connect to the database (change the connection parameters as needed)
        $mysqli = new mysqli("localhost", "root", "", "imperial");

        // Check connection
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        // Prepare SQL statement to insert data into the users table
        $sql = "INSERT INTO users (username, password, user_type) VALUES (?, ?, ?)";

        // Prepare and bind parameters
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sss", $username, $hashed_password, $user_type);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<h2>Registration successful!</h2>";
            echo "<p>Username: $username</p>";
            echo "<p>User Type: $user_type</p>";

            // Add a button to redirect to login.php page
            echo '<form action="login.php" method="get">';
            echo '<button type="submit">Go to Login</button>';
            echo '</form>';
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }

        // Close statement and connection
        $stmt->close();
        $mysqli->close();
    }
} else {
    // Redirect back to registration page if accessed directly
    header("Location: register.php");
    exit();
}
?>
