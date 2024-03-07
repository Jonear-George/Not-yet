<?php
include "config.php";

$id = $_GET['id'];

$delete = "DELETE FROM products WHERE id=$id";
$result = mysqli_query($con, $delete);

if ($result) {
    // Set success message in session
    session_start();
    $_SESSION['success_message'] = "Record deleted successfully!";
} else {
    // Set error message in session
    session_start();
    $_SESSION['error_message'] = "Error deleting record: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);

// Redirect back to index.php
header("Location: index.php");
exit();
?>
