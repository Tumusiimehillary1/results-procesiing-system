<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marks Input Form</title>
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

<form action="process_p3.php" method="post">
    <h2>Marks Input Form for P.3 Marks </h2>

    <label for="student_name">Student Name:</label>
    <input type="text" id="student_name" name="student_name" required>

    <label for="math">Math Marks:</label>
    <input type="number" id="math" name="math" required>

    <label for="english">English Marks:</label>
    <input type="number" id="english" name="english" required>

    <label for="sst">SST Marks:</label>
    <input type="number" id="sst" name="sst" required>

    <label for="science">Science Marks:</label>
    <input type="number" id="science" name="science" required>

    <button type="submit">Submit Marks</button>
</form>

</body>
</html>
