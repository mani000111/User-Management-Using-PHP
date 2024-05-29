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
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Edit User</h1>
        </div>
    </header>

    <div class="container">
        <form action="update_process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user_id; ?>">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" value="<?php echo $user['fname']; ?>" required><br><br>
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" value="<?php echo $user['lname']; ?>" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br><br>
            <input type="submit" value="Update User">
        </form>
    </div>

    <footer>
        <p>&copy; 2024 User Management System</p>
    </footer>
</body>
</html>
