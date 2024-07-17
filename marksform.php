<!DOCTYPE html>
<html>
<head>
    <title>Student Marks Calculation</title>
</head>
<body>
    <h2>Enter Student Marks</h2>
    <form action="pproceess.php" method="post">
        <label for="math">Math:</label><br>
        <input type="number" id="math" name="math" min="0" max="100" required><br>
        
        <label for="science">Science:</label><br>
        <input type="number" id="science" name="science" min="0" max="100" required><br>
        
        <label for="sst">SST:</label><br>
        <input type="number" id="sst" name="sst" min="0" max="100" required><br>
        
        <label for="english">English:</label><br>
        <input type="number" id="english" name="english" min="0" max="100" required><br><br>
        
        <input type="submit" value="Calculate">
    </form>
</body>
</html>
