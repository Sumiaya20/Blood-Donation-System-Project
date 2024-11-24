<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'blood_donation_system');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donor_id = $_POST['donor_id'];
    $donation_date = $_POST['donation_date'];
    $blood_donation_status = $_POST['blood_donation_status'];
    $remarks = $_POST['remarks'];

    // Update the donation record in the database
    $sql = "UPDATE blood_donation 
            SET donation_date = ?, blood_donation_status = ?, remarks = ? 
            WHERE donor_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $donation_date, $blood_donation_status, $remarks, $donor_id);

    if ($stmt->execute()) {
        echo "Donation details updated successfully!";
        // Redirect back to the donation history page
        header("Location: donation_history.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
