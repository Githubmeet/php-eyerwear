<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id=?";
    
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Prepare error: ' . $conn->error);
    }

    $stmt->bind_param('i', $id);
    if ($stmt->execute() === true) {
        header("Location: admin.php");
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
} else {
    header("Location: admin.php");
}

$conn->close();
?>
