<?php
include 'db.php';

// Fetch all users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>User Management Dashboard</h1>
        </div>
    </header>

    <div class="container">
        <h2>All Users</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['lname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="read.php?id=<?php echo $row['id']; ?>">View</a>
                        <a href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="create.php">Add New User</a>
    </div>

    <footer>
        <p>&copy; 2024 User Management System</p>
    </footer>
</body>
</html>
