<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .create-account-button {
            text-align: center;
            margin-top: 20px;
        }

        .create-account-button a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .create-account-button a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="user_type">User Type:</label>
                <select id="user_type" name="user_type">
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="create-account-button">
            <p>Don't have an account? <a href="register.php">Create one</a>.</p>
        </div>
    </div>
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
    }
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .create-account-button {
            text-align: center;
            margin-top: 20px;
        }

        .create-account-button a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .create-account-button a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="user_type">User Type:</label>
                <select id="user_type" name="user_type">
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="create-account-button">
            <p>Don't have an account? <a href="register.php">Create one</a>.</p>
        </div>
    </div>
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
                // Password is correct, redirect based on user type
                $_SESSION["username"] = $username; // Store username in session for future use
                switch ($user_type) {
                    case "teacher":
                        header("Location: marksformm2.php");
                        exit();
                        break;
                    case "student":
                        header("Location: fetch_student_details.php");
                    
                         exit();
                        break;
                    case "admin":
                        header("Location: indexx.php");
                        exit();
                        break;
                    default:
                        echo "Invalid user type!";
                }
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
    }
    ?>
</body>
</html>
