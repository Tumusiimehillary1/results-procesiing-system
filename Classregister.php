<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Registration</title>
    <link rel="stylesheet" href="teachers.css">
    <link rel="stylesheet" href="index.php">
    
</head>
<body>

<div class="container">
    <h2>Class Registration</h2>
    <form action="process_.php" method="post">
        <!-- Your existing form fields -->
        <label for="teacher_id">ID:</label>
        <input type="text" name="teacher_id" required>

        <label for="teacher_name">Name:</label>
        <input type="text" name="teacher_name" required>

        <label for="subject_taught">Subject Taught:</label>
        <input type="text" name="subject_taught" required>

        <label for="residence">Residence:</label>
        <input type="text" name="residence" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="qualification_level">Level of Qualification:</label>
        <input type="text" name="qualification_level" required>

        <!-- ... -->

        <input type="submit" value="Register">
    </form>
</div>

</body>
</html>
