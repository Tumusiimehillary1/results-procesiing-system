<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Marks Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }
    form {
        max-width: 400px;
        margin: 0 auto;
    }
    label {
        display: block;
        margin-bottom: 5px;
    }
    input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>

<h2>Student Marks Form</h2>
<form>
    <label for="studentName">Student Name:</label>
    <input type="text" id="studentName" name="studentName" required>

    <label for="math">Math:</label>
    <input type="text" id="math" name="math" required>

    <label for="science">Science:</label>
    <input type="text" id="science" name="science" required>

    <label for="sst">SST:</label>
    <input type="text" id="sst" name="sst" required>

    <label for="english">English:</label>
    <input type="text" id="english" name="english" required>

    <input type="submit" value="Submit">
</form>

</body>
</html>
