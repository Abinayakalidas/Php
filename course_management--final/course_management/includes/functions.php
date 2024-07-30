<?php
include '../config/database.php';

function get_all_courses() {
    global $conn;
    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);
    return $result;
}

function add_course($course_name, $description) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO courses (course_name, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $course_name, $description);
    $stmt->execute();
    $stmt->close();
}

function get_course_by_id($course_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM courses WHERE id = ?");
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $course = $result->fetch_assoc();
    $stmt->close();
    return $course;
}

function update_course($course_id, $course_name, $description) {
    global $conn;
    $stmt = $conn->prepare("UPDATE courses SET course_name = ?, description = ? WHERE id = ?");
    $stmt->bind_param("ssi", $course_name, $description, $course_id);
    $stmt->execute();
    $stmt->close();
}

function delete_course($course_id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM courses WHERE id = ?");
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $stmt->close();
}
?>
