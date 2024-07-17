<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #3498db;
        }
        button[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Report Form</h2>
        <form action="submit_report.php" method="POST">
            <!-- Dropdown menu for Term field with options 1, 2, and 3 -->
            <label for="term">Term:</label>
            <select id="term" name="term" required>
                <option value="1">Term 1</option>
                <option value="2">Term 2</option>
                <option value="3">Term 3</option>
            </select>
            <label for="student_name">Student Name:</label>
            <input type="text" id="student_name" name="student_name" required>
            <!-- Replaced Subject field with four subjects: Math, Science, SST, and English -->
            <label for="math">Math Marks:</label>
            <input type="number" id="math" name="math" required>
            <label for="science">Science Marks:</label>
            <input type="number" id="science" name="science" required>
            <label for="sst">SST Marks:</label>
            <input type="number" id="sst" name="sst" required>
            <label for="english">English Marks:</label>
            <input type="number" id="english" name="english" required>
            <!-- Added Total Score, Average Score, and Position fields -->
            <label for="total_score">Total Score:</label>
            <input type="number" id="total_score" name="total_score" required>
            <label for="average_score">Average Score:</label>
            <input type="number" id="average_score" name="average_score" required>
            <label for="position">Position:</label>
            <input type="number" id="position" name="position" required>
            <!-- Teacher's comment section -->
            <label for="teacher_comment">Teacher's Comment:</label>
            <textarea id="teacher_comment" name="teacher_comment" rows="4" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
