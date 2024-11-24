<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'blood_donation_system');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $donor_id = $_POST['donor_id'];
    $donation_date = $_POST['donation_date']; // This is the datetime-local input value
    $status = $_POST['status'];
    $blood_volume = $_POST['blood_volume'];

    // Format donation_date from HTML datetime-local to MySQL DATETIME format
    $donation_date = date('Y-m-d H:i:s', strtotime($donation_date));

    // Prepare SQL query to update the blood_donation table
    $sql = "UPDATE blood_donation 
            SET donation_date = ?, status = ?, blood_volume = ? 
            WHERE donor_id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdi", $donation_date, $status, $blood_volume, $donor_id);

    // Execute and check for success
    if ($stmt->execute()) {
        // Redirect to the donation history page after successful submission
        header("Location: appointment_list.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
