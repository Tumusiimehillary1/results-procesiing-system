<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher's Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .dashboard {
            background-color: white;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }
        .dashboard h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .dashboard select, .dashboard button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        .dashboard button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .dashboard button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>Select Class</h1>
        <select id="classSelect">
            <option value="P.1">P.1</option>
            <option value="P.2">P.2</option>
            <option value="P.3">P.3</option>
            <option value="P.4">P.4</option>
            <option value="P.5">P.5</option>
            <option value="P.6">P.6</option>
            <option value="P.7">P.7</option>
        </select>
        <button onclick="selectClass()">Input Marks</button>
    </div>

    <script>
        function selectClass() {
            const selectedClass = document.getElementById('classSelect').value;
            let url = '';
            switch(selectedClass) {
                case 'P.1':
                    url = 'input_marks_p1.php';
                    break;
                case 'P.2':
                    url = 'input_marks_p2.html';
                    break;
                case 'P.3':
                    url = 'input_marks_p3.html';
                    break;
                case 'P.4':
                    url = 'input_marks_p4.html';
                    break;
                case 'P.5':
                    url = 'input_marks_p5.html';
                    break;
                case 'P.6':
                    url = 'input_marks_p6.html';
                    break;
                case 'P.7':
                    url = 'input_marks_p7.html';
                    break;
                default:
                    alert('Please select a valid class');
                    return;
            }
            window.location.href = url;
        }
    </script>
</body>
</html>
