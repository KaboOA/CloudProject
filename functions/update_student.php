<?php
// Database connection
$connect = mysqli_connect('db', 'root', 'Ahmmed_1211', 'db');

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the request body
    $data = json_decode(file_get_contents("php://input"), true);

    // Sanitize the input data to prevent SQL injection
    $id = mysqli_real_escape_string($connect, $data['id']);
    $name = mysqli_real_escape_string($connect, $data['name']);
    $age = mysqli_real_escape_string($connect, $data['age']);
    $cgpa = mysqli_real_escape_string($connect, $data['cgpa']);

    // Prepare and execute the SQL query to update student data
    $query = "UPDATE students SET name='$name', age='$age', cgpa='$cgpa' WHERE id='$id'";
    $result = mysqli_query($connect, $query);

    // Check if the query was successful
    if ($result) {
        // Return a success message
        echo json_encode(array("message" => "Student updated successfully"));
    } else {
        // Return an error message
        echo json_encode(array("message" => "Error updating student"));
    }
} else {
    // Return an error message if the request method is not POST
    echo json_encode(array("message" => "Invalid request method"));
}
?>
