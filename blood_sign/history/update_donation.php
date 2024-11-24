<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'blood_donation_system');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get donor_id from URL
if (isset($_GET['donor_id'])) {
    $donor_id = $_GET['donor_id'];

    // Fetch the donation details for the selected donor
    $sql = "SELECT donor_id, name, blood_type, donation_date, blood_donation_status, remarks 
            FROM blood_donation 
            WHERE donor_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $donor_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the donor record exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Donor not found.";
        exit();
    }
} else {
    echo "No donor ID provided.";
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
    <title>Update Donation Status</title>
    <link rel="stylesheet" href="update_donation.css"> <!-- Linking to CSS -->
</head>

<body>

    <h1>Update Donation Status for Donor ID: <?php echo $row['donor_id']; ?></h1>

    <form action="save_update_donation.php" method="post">
        <input type="hidden" name="donor_id" value="<?php echo $row['donor_id']; ?>">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" readonly><br>

        <label for="blood_type">Blood Type:</label>
        <input type="text" id="blood_type" name="blood_type" value="<?php echo $row['blood_type']; ?>" readonly><br>

        <label for="donation_date">Donation Date:</label>
        <input type="datetime-local" id="donation_date" name="donation_date" value="<?php echo $row['donation_date']; ?>" required><br>

        <label for="blood_donation_status">Donation Status:</label>
        <select id="blood_donation_status" name="blood_donation_status" required>
            <option value="Pending" <?php if ($row['blood_donation_status'] == 'Pending') echo 'selected'; ?>>Pending</option>
            <option value="Done" <?php if ($row['blood_donation_status'] == 'Done') echo 'selected'; ?>>Done</option>
        </select><br>

        <label for="remarks">Remarks:</label>
        <textarea id="remarks" name="remarks" rows="4" cols="50"><?php echo $row['remarks']; ?></textarea><br>

        <div class="button-group">
            <button type="submit" class="save-btn">Save Changes</button>
            <!-- Cancel Button as a form button -->
            <button type="button" class="cancel-btn" onclick="window.location.href='donation_history.php'">Cancel</button>
        </div>
    </form>

</body>

</html>

<?php
// Close connection
$conn->close();
?>