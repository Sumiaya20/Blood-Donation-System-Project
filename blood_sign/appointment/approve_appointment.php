<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'blood_donation_system');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if donor ID is passed
if (isset($_POST['appointment_id'])) {
    $donor_id = $_POST['appointment_id'];

    // Fetch the specific appointment details including appointment_date
    $sql = "SELECT donor_id, blood_type, appointment_date FROM blood_donation WHERE donor_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $donor_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the appointment exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No such appointment found.";
        exit();
    }
} else {
    echo "No appointment ID provided.";
    exit();
}

// Close the statement
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Appointment</title>
    <link rel="stylesheet" href="approval_appointment.css">
    <script>
        // JavaScript function to handle Cancel button click
        function cancelAppointment() {
            window.location.href = 'appointment_list.php'; // Redirect to appointment list page
        }
    </script>
</head>
<body>

    <h1>Approve Blood Donation Appointment</h1>

    <form action="save_approval.php" method="post">
        <input type="hidden" name="donor_id" value="<?php echo $row['donor_id']; ?>">

        <label for="donor_id">Donor ID:</label>
        <input type="text" id="donor_id" name="donor_id_display" value="<?php echo $row['donor_id']; ?>" readonly><br>

        <label for="blood_type">Blood Type:</label>
        <input type="text" id="blood_type" name="blood_type" value="<?php echo $row['blood_type']; ?>" readonly><br>

        <label for="donation_date">Donation Date:</label>
        <input type="datetime-local" id="donation_date" name="donation_date" value="<?php echo $row['appointment_date']; ?>" required><br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Pending">Pending</option>
            <option value="Approved">Approved</option>
            <option value="Rejected">Rejected</option>
        </select><br>

        <label for="blood_volume">Blood Volume (ml):</label>
        <input type="number" id="blood_volume" name="blood_volume" step="0.01" required><br>

        <button type="button" onclick="cancelAppointment()">Cancel</button> <!-- Cancel button -->
        <button type="submit">Submit Approval</button>
    </form>

</body>
</html>
