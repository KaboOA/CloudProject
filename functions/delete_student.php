<?php
// Check if the ID parameter is received
if (isset($_GET['id'])) {
    // Extract the ID from the URL parameter
    $student_id = $_GET['id'];

    // Database connection
    $connect = mysqli_connect('db', 'root', 'Ahmmed_1211', 'db');

    // Prepare the DELETE query
    $query = "DELETE FROM students WHERE id = ?";

    // Bind parameter and execute the query
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "i", $student_id);
    $result = mysqli_stmt_execute($stmt);

    // Check if the query was successful
    if ($result) {
        // Redirect to the page showing the updated student list
        header("Location: ../index.php");
        exit(); // Ensure no further code execution after redirection
    } else {
        // Handle the error if the query fails
        echo "Error deleting student";
    }

    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($connect);
} else {
    // Redirect to the page showing the student list if the ID parameter is missing
    header("Location: index.php");
    exit(); // Ensure no further code execution after redirection
}
?>
