<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $inquirer_name = $_POST['inquirer_name'];
    $inquirer_email = $_POST['inquirer_email'];
    $inquiry_message = $_POST['inquiry_message'];

    // Connect to the database
    $mysqli = new mysqli("localhost", "root", "", "imperial");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare and bind
    $stmt = $mysqli->prepare("INSERT INTO inquiries (student_id, student_name, inquirer_name, inquirer_email, inquiry_message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $student_id, $student_name, $inquirer_name, $inquirer_email, $inquiry_message);

    if ($stmt->execute()) {
        echo "Inquiry submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();
} else {
    echo "Invalid request.";
}
?>
<!-- Back to fetch_student_details.php button -->
<form action="fetch_student_details.php" method="get">
    <button type="submit">Back</button>
</form>