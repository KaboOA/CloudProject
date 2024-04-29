<?php
// Database connection
$connect = mysqli_connect('db', 'root', 'Ahmmed_1211', 'db');

// Check if the ID parameter is provided in the URL
if(isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $student_id = mysqli_real_escape_string($connect, $_GET['id']);

    // Prepare the SQL query to fetch student data based on ID
    $query = "SELECT * FROM students WHERE id = '$student_id'";

    // Execute the query
    $result = mysqli_query($connect, $query);

    // Check if a student with the provided ID exists
    if(mysqli_num_rows($result) > 0) {
        // Fetch student data
        $student = mysqli_fetch_assoc($result);
        // Return the student data as JSON
        echo json_encode($student);
    } else {
        // Return an error message if student not found
        echo json_encode(array("message" => "Student not found"));
    }
} else {
    // Return an error message if ID parameter is not provided
    echo json_encode(array("message" => "Student ID not provided"));
}
?>
