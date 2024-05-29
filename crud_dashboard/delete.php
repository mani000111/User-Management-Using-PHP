<?php
include 'db.php';

$user_id = $_GET['id'];
$sql = "DELETE FROM users WHERE id = $user_id";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>
