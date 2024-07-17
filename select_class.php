<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard with Cards</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
  }

  .container {
    display: flex;
    flex-wrap: wrap;
    padding: 20px;
  }

  .sidebar {
    width: 200px;
    background-color: #4CAF50; /* Green */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 20px;
    margin-right: 20px;
    color: #fff;
  }

  .sidebar h2 {
    margin-bottom: 20px;
  }

  .sidebar ul {
    list-style-type: none;
    padding: 0;
  }

  .sidebar li {
    margin-bottom: 10px;
  }

  .sidebar a {
    text-decoration: none;
    color: #fff;
    transition: color 0.3s ease;
  }

  .sidebar a:hover {
    color: #ddd;
  }

  .card-container {
    flex: 1;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
  }

  .card {
    width: 200px;
    height: 250px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    padding: 20px;
    text-align: center;
  }

  .card h2 {
    color: #fff;
  }

  .card p {
    color: #fff;
  }

  .card a {
    color: #fff;
    text-decoration: none;
  }

  .card a:hover {
    text-decoration: underline;
  }
  .header {
        background-color: #4CAF50; /* Green */
        color: white;
        padding: 20px;
        text-align: center;
        font-size: 40px;

        }
  
  

  .header h1 {
    font-size: 40px;
    margin: 0;
  }

  .view-inquiries-button {
    display: block;
    width: 100%;
    padding: 10px 0;
    background-color: blue; /* Orange */
    color: #fff;
    text-align: center;
    border-radius: 5px;
    text-decoration: none;
    margin-top: 20px;
    transition: background-color 0.3s ease;
  }

  .view-inquiries-button:hover {
    background-color: #e68900;
  }

  .generate-report-button {
    display: block;
    width: 100%;
    padding: 10px 0;
    background-color: #e74c3c; /* Red */
    color: #fff;
    text-align: center;
    border-radius: 5px;
    text-decoration: none;
    margin-top: 20px;
    transition: background-color 0.3s ease;
  }

  .generate-report-button:hover {
    background-color: #c0392b;
  }
</style>
</head>
<body>
<div class="header">
  <h1>WELCOME TO IMPERIAL JUNIOR SCHOOL TEACHERS INTERFACE</h1>
</div>
<div class="container">
  <div class="sidebar">
    <h2>Dashboard</h2>
    <ul>
      <li><a href="p_form.php">P1</a></li>
      <li><a href="p_2form_marks.php">P2</a></li>
      <li><a href="p_3form_marks.php">P.3</a></li>
      <li><a href="p_4form_marks.php">P.4</a></li>
      <li><a href="p_5form_marks.php">P.5</a></li>
      <li><a href="p_6form_marks.php">P.6</a></li>
      <li><a href="p_7form_marks.php">P.7</a></li>
    </ul>
    <a href="view_inquiries.php" class="view-inquiries-button">View Inquiries From Students</a>
    <a href="generate_report.php" class="generate-report-button">Generate Reports/Results</a>
  </div>
  <div class="card-container">
    <div class="card" style="background-color: #3498db;"> <!-- Blue -->
      <h2>P.1</h2>
      <p><a href="p_form.php">Input marks for P.1 here</a></p>
    </div>
    <div class="card" style="background-color: #e74c3c;"> <!-- Red -->
      <h2>P.2</h2>
      <p><a href="p_2form_marks.php">Input marks for P.2 here</a></p>
    </div>
    <div class="card" style="background-color: #9b59b6;"> <!-- Purple -->
      <h2>P.3</h2>
      <p><a href="p_3form_marks.php">Input marks for P.3 here.</a></p>
    </div>
    <div class="card" style="background-color: #2ecc71;"> <!-- Green -->
      <h2>P.4</h2>
      <p><a href="p_4form_marks.php">Input marks for P.4 here</a></p>
    </div>
    <div class="card" style="background-color: #f39c12;"> <!-- Orange -->
      <h2>P.5</h2>
      <p><a href="p_5form_marks.php">Input marks for P.5 here</a></p>
    </div>
    <div class="card" style="background-color: #34495e;"> <!-- Dark -->
      <h2>P.6</h2>
      <p><a href="p_6form_marks.php">Input marks for P.6 here</a></p>
    </div>
    <div class="card" style="background-color: #95a5a6;"> <!-- Gray -->
      <h2>P.7</h2>
      <p><a href="p_7form_marks.php">Input marks for P.7 here.</a></p>
    </div>
  </div>
</div>
</body>
</html>
