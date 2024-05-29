<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $fname = htmlspecialchars(strip_tags(trim($_POST["fname"])));
    $lname = htmlspecialchars(strip_tags(trim($_POST["lname"])));
    $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (fname, lname, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fname, $lname, $email);

    // Execute the query
    if ($stmt->execute()) {
        echo "New record created successfully";
        header("Location: index.php"); // Redirect to the dashboard after creation
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
