<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marks Input Form</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>

<form id="marksForm">
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

    <!-- Hidden input field to store student data -->
    <input type="hidden" id="studentsData" name="students">

    <!-- Button for adding students -->
    <button type="button" onclick="addStudent()">Add Student</button>

    <!-- Table for displaying students -->
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

    <!-- Button to submit the form -->
    <button type="button" onclick="submitForm()">Submit Marks</button>
</form>

<script>
    let students = []; // Array to store student details

    function addStudent() {
        // Retrieve form data
        const studentName = document.getElementById('student_name').value;
        const math = parseInt(document.getElementById('math').value) || 0;
        const english = parseInt(document.getElementById('english').value) || 0;
        const sst = parseInt(document.getElementById('sst').value) || 0;
        const science = parseInt(document.getElementById('science').value) || 0;

        // Calculate total marks and average marks
        const totalMarks = math + english + sst + science;
        const averageMarks = totalMarks / 4;

        // Push student data to the array
        students.push({
            name: studentName,
            math: math,
            english: english,
            sst: sst,
            science: science,
            total: totalMarks,
            average: averageMarks,
            position: null // Position will be assigned later
        });

        // Clear form fields
        document.getElementById('student_name').value = '';
        document.getElementById('math').value = '';
        document.getElementById('english').value = '';
        document.getElementById('sst').value = '';
        document.getElementById('science').value = '';

        // Display student details
        displayStudents();
    }

    function displayStudents() {
        const studentsBody = document.getElementById('studentsBody');
        studentsBody.innerHTML = '';

        students.forEach((student, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${student.name}</td>
                <td>${student.math}</td>
                <td>${student.english}</td>
                <td>${student.sst}</td>
                <td>${student.science}</td>
                <td>${student.total}</td>
                <td>${student.average}</td>
                <td>${student.position || 'N/A'}</td>
            `;
            studentsBody.appendChild(row);
        });
    }

    function submitForm() {
        // Assign positions based on average marks
        students.sort((a, b) => b.average - a.average);
        students.forEach((student, index) => {
            student.position = index + 1;
        });

        // Set student data in the hidden input field
        document.getElementById('studentsData').value = JSON.stringify(students);

        // Submit the form
        document.getElementById('marksForm').submit();
    }
</script>

</body>
</html>
