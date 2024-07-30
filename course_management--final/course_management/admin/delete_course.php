<?php
include '../includes/functions.php';

if (isset($_GET['id'])) {
    $course_id = $_GET['id'];
    delete_course($course_id);
    header("Location: index.php");
    exit;
}
?>
