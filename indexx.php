<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .welcome {
            font-size: 36px;
            margin-bottom: 20px;
            color: #333;
        }

        .card1, .lastcard {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .card, .card2 {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex: 1;
            margin: 0 10px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: #4caf50;
        }

        a:hover {
            text-decoration: underline;
            color: #2e7d32;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome">
            <p>Welcome to Your School Results Processing System</p>
        </div>
        <div class="card1">
            <div class="card">
                <h2>Register Teacher</h2>
                <p>Click <a href="teacher.php">here</a> to register a teacher.</p>
            </div>

            <div class="card">
                <h2>Register Class</h2>
                <p>Click <a href="class_registration.php">here</a> to register a class.</p>
            </div>

            <div class="card">
                <h2>Register Subject</h2>
                <p>Click <a href="subject.php">here</a> to register a subject.</p>
            </div>
        </div>
        <div class="lastcard">
            <div class="card2">
                <h2>Register Student</h2>
                <p>Click <a href="student.php">here</a> to register a student.</p>
            </div>
        </div>
    </div>
</body>
</html>
