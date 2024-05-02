<?php
// Check if the form data is received
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Extract the student data from the JSON payload
    $data = json_decode(file_get_contents("php://input"), true);

    // Validate the data (you can add more validation as needed)
    if (isset($data['id']) && isset($data['name']) && isset($data['age']) && isset($data['cgpa'])) {
        // Database connection
        $connect = mysqli_connect('db', 'root', 'Ahmmed_1211', 'db');

        // Prepare the INSERT query
        $query = "INSERT INTO students (id, name, age, cgpa) VALUES (?, ?, ?, ?)";

        // Bind parameters and execute the query
        $stmt = mysqli_prepare($connect, $query);
        mysqli_stmt_bind_param($stmt, "isdd", $data['id'], $data['name'], $data['age'], $data['cgpa']);
        $result = mysqli_stmt_execute($stmt);

        // Check if the query was successful
        if ($result) {
            // Return a success message
            echo json_encode(array("message" => "Student added successfully"));
        } else {
            // Return an error message
            echo json_encode(array("message" => "Error adding student"));
        }

        // Close statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($connect);
    } else {
        // Return an error message if required fields are missing
        echo json_encode(array("message" => "ID, name, age, and CGPA are required fields"));
    }
} else {
    // Return an error message if request method is not POST
    echo json_encode(array("message" => "Invalid request method"));
}
?>
