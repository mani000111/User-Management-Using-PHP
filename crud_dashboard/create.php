<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Add New User</h1>
        </div>
    </header>

    <div class="container">
        <form action="create_process.php" method="POST">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" required><br><br>
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <input type="submit" value="Add User">
        </form>
    </div>

    <footer>
        <p>&copy; 2024 User Management System</p>
    </footer>
</body>
</html>
