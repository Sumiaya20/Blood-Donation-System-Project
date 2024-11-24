<?php
include('config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user exists in the database
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, start session and redirect to homepage
        $_SESSION['username'] = $username;
        header('Location: homepage.php');
        exit;
    } else {
        // Invalid login
        header('Location: index.php?error=1');
        exit;
    }
}
?>
