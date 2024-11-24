<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood_donation_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $blood_type = $_POST['blood_type'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $last_donation_date = !empty($_POST['last_donation_date']) ? $_POST['last_donation_date'] : NULL; // Handle empty date
    $appointment_date = $_POST['appointment_date'];
    $donation_center_name = $_POST['donation_center_name'];
    $donation_center_address = $_POST['donation_center_address'];

    // Prepare SQL query
    $sql = "INSERT INTO blood_donation (name, dob, blood_type, phone, email, last_donation_date, appointment_date, donation_center_name, donation_center_address)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $name, $dob, $blood_type, $phone, $email, $last_donation_date, $appointment_date, $donation_center_name, $donation_center_address);

    // Execute and check for success
    if ($stmt->execute()) {
        // Redirect to the appointment list page after successful submission
        // Pass a flag to reset the form after redirection
        header("Location: appointment_list.php?reset=true");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
