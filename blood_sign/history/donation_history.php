<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'blood_donation_system');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch only approved donation history data from the database including blood_donation_status and remarks
$sql = "SELECT donor_id, name, blood_type, donation_date, blood_volume, status, blood_donation_status, remarks 
        FROM blood_donation 
        WHERE status = 'Approved' 
        ORDER BY donation_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation History</title>
    <link rel="stylesheet" href="donation_history.css"> <!-- Linking external CSS file -->
</head>
<body>

    <h1>Blood Donation History</h1>

    <!-- Go to Homepage Button -->
    <a href="../homepage.php"><button class="go-home-button">Go to Homepage</button></a>

    <table>
        <thead>
            <tr>
                <th>Donor ID</th>
                <th>Name</th>
                <th>Blood Type</th>
                <th>Donation Date</th>
                <th>Blood Volume (ml)</th>
                <th>Donation Status</th>
                <th>Remarks</th>
                <th>Action</th> <!-- Action column -->
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if there are records in the result
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['donor_id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['blood_type'] . "</td>";
                    echo "<td>" . $row['donation_date'] . "</td>";
                    echo "<td>" . $row['blood_volume'] . "</td>";
                    echo "<td>" . $row['blood_donation_status'] . "</td>";
                    echo "<td>" . $row['remarks'] . "</td>";

                    // Check if the blood_donation_status is 'Done'
                    if ($row['blood_donation_status'] == 'Done') {
                        echo "<td>Donated</td>"; // Show 'Donated'
                    } else {
                        // Show the 'Donation' button if not 'Done'
                        echo "<td><a href='update_donation.php?donor_id=" . $row['donor_id'] . "'><button type='button' class='donation-btn'>Donation</button></a></td>";
                    }

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No approved donation history available</td></tr>"; // Updated colspan to 9
            }
            ?>
        </tbody>
    </table>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
