<?php
// Include the database connection file
include_once('../connection/db_connection.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Prepare the DELETE query
    $deleteQuery = "DELETE FROM contact_form WHERE id = ?";
    $stmt = mysqli_prepare($db, $deleteQuery);

    // Check if the statement was prepared successfully
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $id);
        
        // Execute the statement
        $run = mysqli_stmt_execute($stmt);

        if ($run) {
            echo '<script>alert("Message deleted successfully!");</script>';
            echo "<script>window.location.href = 'index.php?Messages=true';</script>";
        } else {
            echo '<script>alert("Failed to delete the message. Please try again.");</script>';
            echo "<script>window.location.href = 'index.php?Messages=true';</script>";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo '<script>alert("Failed to prepare the statement.");</script>';
        echo "<script>window.location.href = 'index.php?Messages=true';</script>";
    }
} else {
    echo '<script>alert("Invalid message ID.");</script>';
    echo "<script>window.location.href = 'index.php?Messages=true';</script>";
}
?>
