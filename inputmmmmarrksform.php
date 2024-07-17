<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marks Input Form</title>
    <style>
        /* Your existing CSS styles */
    </style>
</head>
<body>

<form id="marksForm" method="post" action="process_marks.php"> <!-- Added method and action -->
    <h2>Marks Input Form</h2>

    <div id="studentsContainer">
        <!-- Student input fields will be added dynamically here -->
    </div>

    <button type="button" onclick="addStudent()">Add Student</button>
    <button type="button" onclick="submitMarks()">Submit Marks</button> <!-- Changed type to "button" -->
</form>

<script>
    let studentCount = 0;

    function addStudent() {
        studentCount++;
        const container = document.getElementById('studentsContainer');

        const studentDiv = document.createElement('div');
        studentDiv.innerHTML = `
            <h3>Student ${studentCount}</h3>
            <label for="student_${studentCount}_name">Student Name:</label>
            <input type="text" id="student_${studentCount}_name" name="student_name[]" required> <!-- Changed name attribute to "student_name[]" -->
            <br>
            <label for="student_${studentCount}_math">Math Marks:</label>
            <input type="number" id="student_${studentCount}_math" name="math[]" required> <!-- Changed name attribute to "math[]" -->
            <br>
            <label for="student_${studentCount}_english">English Marks:</label>
            <input type="number" id="student_${studentCount}_english" name="english[]" required> <!-- Changed name attribute to "english[]" -->
            <br>
            <label for="student_${studentCount}_sst">SST Marks:</label>
            <input type="number" id="student_${studentCount}_sst" name="sst[]" required> <!-- Changed name attribute to "sst[]" -->
            <br>
            <label for="student_${studentCount}_science">Science Marks:</label>
            <input type="number" id="student_${studentCount}_science" name="science[]" required> <!-- Changed name attribute to "science[]" -->
            <br>
        `;

        container.appendChild(studentDiv);
    }

    function submitMarks() {
        const students = document.querySelectorAll('[id^="student_"]');
        const formData = new FormData(); // Create FormData object to send form data

        students.forEach(student => {
            const studentId = student.id.split('_')[1]; // Extract student ID
            const name = document.getElementById(`student_${studentId}_name`).value;
            const math = document.getElementById(`student_${studentId}_math`).value;
            const english = document.getElementById(`student_${studentId}_english`).value;
            const sst = document.getElementById(`student_${studentId}_sst`).value;
            const science = document.getElementById(`student_${studentId}_science`).value;

            // Append each student's data to FormData object
            formData.append('student_name[]', name);
            formData.append('math[]', math);
            formData.append('english[]', english);
            formData.append('sst[]', sst);
            formData.append('science[]', science);
        });

        // Send form data to server using AJAX
        fetch('process_marks.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Output server response
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>

</body>
</html>
