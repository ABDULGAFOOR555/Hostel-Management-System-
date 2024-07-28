<?php
session_start();
include('db.php');

if ($_SESSION['role'] != 'admin') {
    echo "Access denied.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_number = $_POST['room_number'];
    $type = $_POST['type'];

    $sql = "INSERT INTO rooms (room_number, type, status) VALUES ('$room_number', '$type', 'available')";
    if ($conn->query($sql) === TRUE) {
        echo "New room added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Rooms</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="room_number" placeholder="Room Number" required>
        <input type="text" name="type" placeholder="Room Type" required>
        <button type="submit">Add Room</button>
    </form>
</body>
</html>
