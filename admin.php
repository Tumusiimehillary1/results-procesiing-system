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
           
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .welcome {
            font-size: 50px;
            margin-bottom: 20px;
            text-align:center;
            }
        .card1{
            
            display: flex;
            width:100%;
            height:40vh;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
            text-align: center;
            width: 100%;
        }
        .lastcard{
            display: flex;
            width:100%;
            height:40vh;
        }
        .card2{
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
            text-align: center;
            width: 100%;
       
        }

        h2 {
            color: #333;
        }

        a {
            text-decoration: none;
            color: #4caf50;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
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

    <div class="card2">
        <h2>Input Results</h2>
        <p>Click <a href="marksformm2.php">here</a> to input results.</p>
    </div>

    <div class="card2">
        <h2>Student_Report</h2>
        <p>Click <a href="Report_list.php">here</a> to see reports.</p>
    </div>
    </div>

</body>
</html>
