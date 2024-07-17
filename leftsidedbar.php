<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            background-color: #333;
            padding-top: 20px;
            color: white;
        }

        #sidebar a {
            padding: 10px;
            text-decoration: none;
            color: white;
            display: block;
            transition: background 0.3s;
        }

        #sidebar a:hover {
            background-color: #555;
        }

        #sidebar .dropdown {
            display: none;
            padding-left: 20px;
        }

        #sidebar .dropdown a {
            padding: 8px;
        }

        #sidebar .dropdown.active {
            display: block;
        }

        #sidebar img {
            max-width: 30px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <div id="sidebar">
        <a href="#" class="major-item" onclick="toggleDropdown('dashboard')">
            <img src="dashboard-icon.png" alt="Dashboard Icon">
            Dashboard
        </a>
        <div class="dropdown" id="dashboard">
            <a href="#">Submenu 1</a>
            <a href="#">Submenu 2</a>
        </div>

        <a href="#" class="major-item" onclick="toggleDropdown('appearance')">
            <img src="appearance-icon.png" alt="Appearance Icon">
            Appearance
        </a>
        <div class="dropdown" id="appearance">
            <a href="#">Submenu 1</a>
            <a href="#">Submenu 2</a>
        </div>

        <a href="#" class="major-item" onclick="toggleDropdown('student-classes')">
            <img src="student-classes-icon.png" alt="Student Classes Icon">
            Student Classes
        </a>
        <div class="dropdown" id="student-classes">
            <a href="#">Submenu 1</a>
            <a href="#">Submenu 2</a>
        </div>

        <a href="#" class="major-item" onclick="toggleDropdown('create-class')">
            <img src="create-class-icon.png" alt="Create Class Icon">
            Create a Class
        </a>
        <div class="dropdown" id="create-class">
            <a href="#">Submenu 1</a>
            <a href="#">Submenu 2</a>
        </div>

        <a href="#" class="major-item" onclick="toggleDropdown('manage-classes')">
            <img src="manage-classes-icon.png" alt="Manage Classes Icon">
            Manage Classes
        </a>
        <div class="dropdown" id="manage-classes">
            <a href="#">Submenu 1</a>
            <a href="#">Submenu 2</a>
        </div>

        <a href="#" class="major-item" onclick="toggleDropdown('subjects')">
            <img src="subjects-icon.png" alt="Subjects Icon">
            Subjects
        </a>
        <div class="dropdown" id="subjects">
            <a href="#">Submenu 1</a>
            <a href="#">Submenu 2</a>
        </div>

        <a href="#" class="major-item" onclick="toggleDropdown('create-subject')">
            <img src="create-subject-icon.png" alt="Create Subject Icon">
            Create Subject
        </a>
        <div class="dropdown" id="create-subject">
            <a href="#">Submenu 1</a>
            <a href="#">Submenu 2</a>
        </div>

        <a href="#" class="major-item" onclick="toggleDropdown('manage-subjects')">
            <img src="manage-subjects-icon.png" alt="Manage Subjects Icon">
            Manage Subjects
        </a>
        <div class="dropdown" id="manage-subjects">
            <a href="#">Submenu 1</a>
            <a href="#">Submenu 2</a>
        </div>

        <a href="#" class="major-item" onclick="toggleDropdown('students')">
            <img src="students-icon.png" alt="Students Icon">
            Students
        </a>
        <div class="dropdown" id="students">
            <a href="#">Submenu 1</a>
            <a href="#">Submenu 2</a>
        </div>

        <a href="#" class="major-item" onclick="toggleDropdown('add-students')">
            <img src="add-students-icon.png" alt="Add Students Icon">
            Add Students
        </a>
        <div class="dropdown" id="add-students">
            <a href="#">Submenu 1</a>
            <a href="#">Submenu 2</a>
        </div>

        <a href="#" class="major-item" onclick="toggleDropdown('manage-students')">
            <img src="manage-students-icon.png" alt="Manage Students Icon">
            Manage Students
        </a>
        <div class="dropdown" id="manage-students">
            <a href="#">Submenu 1</a>
            <a href="#">Submenu 2</a>
        </div>

        <a href="#" class="major-item" onclick="toggleDropdown('result')">
            <img src="result-icon.png" alt="Result Icon">
            Result
        </a>
        <div class="dropdown" id="result">
            <a href="#">Submenu 1</a>
            <a href="#">Submenu 2</a>
        </div>

        <a href="#" class="major-item" onclick="toggleDropdown('add-result')">
            <img src="add-result-icon.png" alt="Add Result Icon">
            Add Result
        </a>
        <div class="dropdown" id="add-result">
            <a href="#">Submenu 1</a>
            <a href="#">Submenu 2</a>
        </div>

        <a href="#" class="major-item" onclick="toggleDropdown('manage-result')">
            <img src="manage-result-icon.png" alt="Manage Result Icon">
            Manage Result
        </a>
        <div class="dropdown" id="manage-result">
            <a href="#">Submenu 1</a>
            <a href="#">Submenu 2</a>
        </div>

    </div>

    <div id="content">
        <!-- Your content goes here -->
    </div>

    <script>
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle('active');
        }
    </script>

</body>
</html>
