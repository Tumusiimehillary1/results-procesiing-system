<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Input Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, select {
            margin-bottom: 10px;
            width: 200px;
        }
    </style>
</head>
<body>

<h2>Mark Input Page</h2>

<form>
    <label for="studentDropdown">Select Student:</label>
    <select id="studentDropdown" name="student">
        <!-- You would dynamically populate this dropdown with student names from the database -->
        <option value="student1">Student 1</option>
        <option value="student2">Student 2</option>
        <!-- Add more options as needed -->
    </select>

    <label for="math">Math:</label>
    <input type="number" id="math" name="math" required>

    <label for="english">English:</label>
    <input type="number" id="english" name="english" required>

    <label for="sst">SST:</label>
    <input type="number" id="sst" name="sst" required>

    <label for="science">Science:</label>
    <input type="number" id="science" name="science" required>

    <input type="submit" value="Submit">
</form>

</body>
</html>
