<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Student Dashboard</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}

header img {
    height: 50px;
    vertical-align: middle;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 0 20px;
}

section {
    margin-bottom: 40px;
}

h2 {
    margin-top: 0;
}

ul {
    list-style: none;
    padding: 0;
}

ul li {
    margin-bottom: 10px;
}

.btn {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
}

.btn:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <header>
        <h1>Student Dashboard</h1>
        <img src="university_logo.png" alt="University Logo">
    </header>
    <div class="container">
        <section id="quick-links">
            <h2>Quick Links</h2>
            <ul>
                <li><a href="#">View Results</a></li>
                <li><a href="#">View Report</a></li>
                <li><a href="#">Submit Inquiry</a></li>
                <li><a href="#">View Student Details</a></li>
                <li><a href="#">Print Report or Download</a></li>
            </ul>
        </section>
        <section id="student-info">
            <h2>Student Information</h2>
            <ul>
                <li><strong>Name:</strong> John Doe</li>
                <li><strong>Student ID:</strong> 123456</li>
                <li><strong>Program:</strong> Computer Science</li>
                <li><strong>Year:</strong> 3</li>
                <li><strong>GPA:</strong> 3.8</li>
            </ul>
        </section>
        <section id="results">
            <h2>Results</h2>
            <ul>
                <li>Subject 1: A</li>
                <li>Subject 2: B+</li>
                <li>Subject 3: A-</li>
                <li>Subject 4: B</li>
                <li>Subject 5: A+</li>
            </ul>
        </section>
        <section id="report">
            <h2>Report</h2>
            <a href="#" class="btn">Download Report</a>
        </section>
        <section id="inquiry">
            <h2>Inquiry</h2>
            <a href="#" class="btn">Submit Inquiry</a>
        </section>
        <section id="student-details">
            <h2>Student Details</h2>
            <ul>
                <li><strong>Name:</strong> John Doe</li>
                <li><strong>Student ID:</strong> 123456</li>
                <li><strong>Program:</strong> Computer Science</li>
                <li><strong>Year:</strong> 3</li>
                <li><strong>Email:</strong> john.doe@example.com</li>
                <li><strong>Phone:</strong> +1234567890</li>
            </ul>
        </section>
    </div>
</body>
</html>
