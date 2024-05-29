<?php
include 'db.php';

$user_id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>User Details</h1>
        </div>
    </header>

    <div class="container">
        <p>ID: <?php echo $user['id']; ?></p>
        <p>First Name: <?php echo $user['fname']; ?></p>
        <p>Last Name: <?php echo $user['lname']; ?></p>
        <p>Email: <?php echo $user['email']; ?></p>
    </div>

    <footer>
        <p>&copy; 2024 User Management System</p>
    </footer>
</body>
</html>
