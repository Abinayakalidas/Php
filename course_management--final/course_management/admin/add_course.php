<?php
include '../includes/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Course</title>
    <link rel="stylesheet" href="../css/style.css">
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
    </style>
    <script>
        function showPopup(message) {
            alert(message);
            window.location.href = 'index.php';
        }
    </script>
</head>
<body style="background-image: url('../assets/pink.jpg'); background-size: cover; background-repeat: no-repeat;">
    <div class="form-container">
        
    <h2>Add New Course</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="course_name">Course Name:</label>
        <input type="text" name="course_name" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description"></textarea>
        <br>
        <input type="submit" value="Add Course">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $course_name = $_POST['course_name'];
        $description = $_POST['description'];
        add_course($course_name, $description);
        echo "<script>showPopup('Course updated successfully!');</script>";
    }
    ?>
    </div>
</body>
</html>
