<?php
include('config.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $blood_name = $_POST['blood_name'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];

    // Insert into database
    $query = "INSERT INTO blood_list (blood_name, quantity, status) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sis", $blood_name, $quantity, $status);

    if ($stmt->execute()) {
        header("Location: view_blood_list.php?success=1");
    } else {
        header("Location: view_blood_list.php?error=1");
    }
}
?>
