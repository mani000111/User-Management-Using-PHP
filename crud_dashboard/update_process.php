<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $id = htmlspecialchars(strip_tags(trim($_POST["id"])));
    $fname = htmlspecialchars(strip_tags(trim($_POST["fname"])));
    $lname = htmlspecialchars(strip_tags(trim($_POST["lname"])));
    $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
    
    // Prepare and bind
    $stmt = $conn->prepare("UPDATE users SET fname = ?, lname = ?, email = ? WHERE id = ?");
    $stmt->bind_param("sssi", $fname, $lname, $email, $id);

    // Execute the query
    if ($stmt->execute()) {
        echo "Record updated successfully";
        header("Location: index.php"); // Redirect to the dashboard after update
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
