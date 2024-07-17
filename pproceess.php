<!DOCTYPE html>
<html>
<head>
    <title>Student Marks Calculation</title>
</head>
<body>
    <?php
    // Retrieve form data
    $math = $_POST["math"];
    $science = $_POST["science"];
    $sst = $_POST["sst"];
    $english = $_POST["english"];

    // Calculate total and average marks
    $total = $math + $science + $sst + $english;
    $average = $total / 4;

    // Display results
    echo "<h2>Results</h2>";
    echo "<p>Total Marks: $total</p>";
    echo "<p>Average Marks: $average</p>";
    ?>
</body>
</html>
