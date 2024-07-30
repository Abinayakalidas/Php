<?php
include '../includes/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
    <link rel="stylesheet" href="../css/style.css">
    <script>
        function showPopup(message) {
            alert(message);
            window.location.href = 'index.php';
        }
    </script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.8); /* White with opacity */
            backdrop-filter: blur(10px); /* Blurred background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        form label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        form input[type="text"],
        form textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body style="background-image: url('../assets/blue.jpg'); background-size: cover; background-repeat: no-repeat;">
    <div class="form-container">
        <h2>Edit Course</h2>
        <?php
        // Check if the course ID is set in the URL
        if (isset($_GET['id'])) {
            $course_id = $_GET['id'];

            // Fetch course details
            $course = get_course_by_id($course_id);

            if ($course) {
                $course_name = $course['course_name'];
                $description = $course['description'];
            } else {
                echo "Course not found.";
                exit;
            }
        } else {
            echo "Invalid request.";
            exit;
        }

        // Handle form submission
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $course_name = $_POST['course_name'];
            $description = $_POST['description'];

            // Update course details
            update_course($course_id, $course_name, $description);
            echo "<script>showPopup('Course updated successfully!');</script>";
            exit;
        }
        ?>
        <form method="post" action="">
            <label for="course_name">Course Name:</label>
            <input type="text" name="course_name" value="<?php echo $course_name; ?>" required>
            <br>
            <label for="description">Description:</label>
            <textarea name="description"><?php echo $description; ?></textarea>
            <br>
            <input type="submit" value="Update Course">
        </form>
    </div>
</body>
</html>
