<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marks Input Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<form action="process_marks.php" method="post" id="marksForm">
    <h2>Marks Input Form</h2>

    <label for="student_name">Student Name:</label>
    <input type="text" id="student_name" name="student_name" required>

    <label for="math">Math Marks:</label>
    <input type="number" id="math" name="math" required>

    <label for="english">English Marks:</label>
    <input type="number" id="english" name="english" required>

    <label for="sst">SST Marks:</label>
    <input type="number" id="sst" name="sst" required>

    <label for="science">Science Marks:</label>
    <input type="number" id="science" name="science" required>

    <button type="button" onclick="addStudent()">CALCULATE</button>
    <button type="button" onclick="resetForm()">Refresh</button>
    <script>
    // Function to reset the specified input fields
    function resetForm() {
        document.getElementById('student_name').value = ''; // Reset Student Name
        document.getElementById('math').value = ''; // Reset Math Marks
        document.getElementById('english').value = ''; // Reset English Marks
        document.getElementById('sst').value = ''; // Reset SST Marks
        document.getElementById('science').value = ''; // Reset Science Marks
    }
</script>




    <table id="studentsTable">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Math Marks</th>
                <th>English Marks</th>
                <th>SST Marks</th>
                <th>Science Marks</th>
                <th>Total Marks</th>
                <th>Average Marks</th>
                <th>Position</th>
            </tr>
        </thead>
        <tbody id="studentsBody"></tbody>
    </table>
    
    <!-- Hidden input field for position -->
    <input type="hidden" id="position" name="position" value="">

    <button type="submit">Submit Marks</button>
</form>

<script>
    function addStudent() {
        // Your existing code for calculating and displaying students' details goes here
        
        // After calculation, refresh the page
        location.reload();
    }
</script>

<script>
    let students = []; // Array to store student details

    // Function to add a student and calculate their marks, total, average, and position
    function addStudent() {
        const studentName = document.getElementById('student_name').value;
        const math = parseInt(document.getElementById('math').value) || 0;
        const english = parseInt(document.getElementById('english').value) || 0;
        const sst = parseInt(document.getElementById('sst').value) || 0;
        const science = parseInt(document.getElementById('science').value) || 0;

        const totalMarks = math + english + sst + science;
        const averageMarks = totalMarks / 4;

        // Add student details to the array
        students.push({
            name: studentName,
            math: math,
            english: english,
            sst: sst,
            science: science,
            total: totalMarks,
            average: averageMarks,
            position: null // Initially set position to null
        });

        // Sort students by average marks in descending order
        students.sort((a, b) => b.average - a.average);

        // Assign positions based on sorted order
        let currentPosition = 1;
        let previousAverage = null;
        students.forEach((student, index) => {
            if (index > 0 && student.average === students[index - 1].average) {
                student.position = students[index - 1].position;
            } else {
                student.position = currentPosition++;
            }
        });
        
        // Set position value in the hidden input field
        document.getElementById('position').value = currentPosition;

        // Display student details
        displayStudents();
    }

    // Function to display student details
    function displayStudents() {
        const studentsBody = document.getElementById('studentsBody');
        studentsBody.innerHTML = '';

        students.forEach(student => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${student.name}</td>
                <td>${student.math}</td>
                <td>${student.english}</td>
                <td>${student.sst}</td>
                <td>${student.science}</td>
                <td>${student.total}</td>
                <td>${student.average}</td>
                <td>${student.position}</td>
            `;
            studentsBody.appendChild(row);
        });
    }
</script>

</body>
</html>
