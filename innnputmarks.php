<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Marks Calculator</title>
<style>
    label {
        display: block;
        margin-bottom: 10px;
    }
</style>
</head>
<body>
    <h2>Student Marks Calculator</h2>
    <form id="marksForm">
        <label for="studentName">Student Name:</label>
        <input type="text" id="studentName" name="studentName" required><br>
        
        <label for="math">Math:</label>
        <input type="number" id="math" name="math" required><br>
        
        <label for="science">Science:</label>
        <input type="number" id="science" name="science" required><br>
        
        <label for="sst">SST:</label>
        <input type="number" id="sst" name="sst" required><br>
        
        <label for="english">English:</label>
        <input type="number" id="english" name="english" required><br>
        
        <button type="button" onclick="calculateMarks()">Calculate</button>
    </form>
    
    <div id="results"></div>
    
    <button onclick="submitToDatabase()">Submit to Database</button>
    
    <script>
        var students = [];

        function calculateMarks() {
            var studentName = document.getElementById('studentName').value;
            var math = parseFloat(document.getElementById('math').value);
            var science = parseFloat(document.getElementById('science').value);
            var sst = parseFloat(document.getElementById('sst').value);
            var english = parseFloat(document.getElementById('english').value);
            
            var totalMarks = math + science + sst + english;
            var averageMarks = totalMarks / 4;
            
            var position = "1st"; // You can implement logic to determine position
            
            var student = {
                name: studentName,
                math: math,
                science: science,
                sst: sst,
                english: english,
                totalMarks: totalMarks,
                averageMarks: averageMarks,
                position: position
            };

            students.push(student);
            
            displayResults();
            
            document.getElementById('marksForm').reset(); // Reset the form after calculation
        }

        function displayResults() {
            var resultsDiv = document.getElementById('results');
            resultsDiv.innerHTML = '';

            // Update positions based on average marks
            students.sort(function(a, b) {
                return b.averageMarks - a.averageMarks;
            });

            students.forEach(function(student, index) {
                student.position = ordinalSuffix(index + 1);
            });

            students.forEach(function(student, index) {
                resultsDiv.innerHTML += `
                    <h3>Result for ${student.name}</h3>
                    <p>Total Marks: ${student.totalMarks}</p>
                    <p>Average Marks: ${student.averageMarks}</p>
                    <p>Position: ${student.position}</p>
                    <hr>
                `;
            });
        }

        // Function to add ordinal suffix to numbers
        function ordinalSuffix(num) {
            var j = num % 10,
                k = num % 100;
            if (j == 1 && k != 11) {
                return num + "st";
            }
            if (j == 2 && k != 12) {
                return num + "nd";
            }
            if (j == 3 && k != 13) {
                return num + "rd";
            }
            return num + "th";
        }

        function submitToDatabase() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "ppprocessmmarks.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        alert("Data saved to database successfully!");
                    } else {
                        alert("Error occurred while saving data to database.");
                    }
                }
            };
            xhr.send(JSON.stringify(students));
        }
    </script>
</body>
</html>
