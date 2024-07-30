<?php
include '../includes/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            background: #f0f0f0; /* Light gray background */
        }

        #main-header {
            /* background: linear-gradient(to right, #88d5e3, #e388d5); */
            background-color: #318d9e;
            color: #fff;
            padding: 20px 0;
        }

        #main-header h1 {
            text-align: center;
            text-transform: uppercase;
            margin: 0;
            font-size: 36px;
        }

        #navbar {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #004d40;
        }

        #navbar a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        #navbar a:hover {
            background-color: #00796b;
            color: #fff;
        }

        #main {
            flex: 1; /* Allows main section to grow and fill the space between header and footer */
            padding: 20px;
        }

        .table-container {
            background-color: #ffffff;
            color: #000;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td a {
            color: #4CAF50;
            text-decoration: none;
        }

        td a:hover {
            text-decoration: underline;
        }

        td a .fas {
            color: #000;
            transition: color 0.3s;
        }

        td a .fas:hover {
            color: #4CAF50;
        }

        footer {
            /* background: linear-gradient(to right,  #88d5e3, #e388d5); */
            background-color: #318d9e;
            text-align: center;
            color: white;
            padding: 20px 0;
            width: 100%;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }

        .no-courses {
            text-align: center;
            font-size: 18px;
            color: #666;
            padding: 50px 0;
        }

        #add-course-btn {
            position: fixed;
            bottom: 70px;
            right: 30px;
            display: block;
            padding: 10px 20px;
            background-color: #be85c1;
            color: #fff;
            text-align: center;
            text-decoration: none;
            font-size: 18px;
            border-radius: 25px;
            width: 120px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000; /* Ensure the button is on top of other elements */
        }

        #add-course-btn:hover {
            background-color: grey;
        }
    </style>
    <title>Course Management System</title>
</head>
<body>
    <header id="main-header">
        <div class="container">
            <h1 style="color: white;">Course Management System</h1>
        </div>
    </header>
    <div id="main">
        <a href="add_course.php" id="add-course-btn">Add Course</a>
        <div class="table-container">
            <?php
            $courses = get_all_courses();
            if ($courses->num_rows > 0) {
                echo "<table>
                        <thead>
                            <tr>
                                <th style='width: 100px;'>Course ID</th>
                                <th style='width: 200px;'>Course Name</th>
                                <th style='width: 800px;'>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>";
                while($row = $courses->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['course_name']}</td>
                            <td>{$row['description']}</td>
                            <td><a href='delete_course.php?id={$row['id']}'>Delete</a></td>
                            <td><a href='edit_course.php?id={$row['id']}'><i class='fas fa-edit'></i></a></td>
                        </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<div class='no-courses'>No courses found</div>";
            }
            ?>
        </div>
    </div>
    <footer>
        <p>Course Management System &copy; 2024</p>
    </footer>
</body>
</html>
