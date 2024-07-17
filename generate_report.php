<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Imperial Junior School Teachers Interface</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
  }

  .header {
    background-color: #4CAF50;
    color: white;
    padding: 20px;
    text-align: center;
    font-size: 30px;
  }

  .container {
    display: flex;
    flex-wrap: wrap;
    padding: 20px;
    justify-content: center;
  }

  .card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    width: 100%;
  }

  .card {
    width: 200px;
    height: 250px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 10px;
    padding: 20px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .card h2 {
    color: #fff;
    margin-bottom: 20px;
  }

  .card a {
    color: #fff;
    text-decoration: none;
    background-color: rgba(0, 0, 0, 0.2);
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
  }

  .card a:hover {
    background-color: rgba(0, 0, 0, 0.4);
  }

  .back-button {
    display: block;
    width: 200px;
    padding: 10px 0;
    background-color: #e74c3c;
    color: #fff;
    text-align: center;
    border-radius: 5px;
    text-decoration: none;
    margin: 20px auto;
    transition: background-color 0.3s ease;
  }

  .back-button:hover {
    background-color: #c0392b;
  }
</style>
</head>
<body>
  <div class="header">
    <h1>WELCOME TO IMPERIAL JUNIOR SCHOOL TEACHERS INTERFACE</h1>
  </div>
  <div class="container">
    <a href="select_class.php" class="back-button">Back to Select Class</a>
    <div class="card-container">
      <div class="card" style="background-color: #3498db;"> <!-- Blue -->
        <h2>P.1</h2>
        <a href="P.1_Marks_%20List.php">Generate report for P.1</a>
      </div>
      <div class="card" style="background-color: #e74c3c;"> <!-- Red -->
        <h2>P.2</h2>
        <a href="P.2_Marks_%20List.php">Generate report for P.2</a>
      </div>
      <div class="card" style="background-color: #9b59b6;"> <!-- Purple -->
        <h2>P.3</h2>
        <a href="P.3_Marks_%20List">Generate report for P.3</a>
      </div>
      <div class="card" style="background-color: #2ecc71;"> <!-- Green -->
        <h2>P.4</h2>
        <a href="P.4_Marks_%20List.php">Generate report for P.4</a>
      </div>
      <div class="card" style="background-color: #f39c12;"> <!-- Orange -->
        <h2>P.5</h2>
        <a href="P.5_Marks_%20List.php">Generate report for P.5</a>
      </div>
      <div class="card" style="background-color: #34495e;"> <!-- Dark -->
        <h2>P.6</h2>
        <a href="P.6_Marks_%20List.php">Generate report for P.6</a>
      </div>
      <div class="card" style="background-color: #95a5a6;"> <!-- Gray -->
        <h2>P.7</h2>
        <a href="P.7_Marks_%20List.php">Generate report for P.7</a>
      </div>
    </div>
  </div>
</body>
</html>
