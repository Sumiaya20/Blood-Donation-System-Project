<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'blood_donation_system');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all appointments from the database
$sql = "SELECT donor_id, name, dob, blood_type, phone, email, last_donation_date, appointment_date, donation_center_name, donation_center_address, status FROM blood_donation";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="appointment_list.css">
</head>
<body>
    <h1>Blood Donation Appointments</h1>

    <!-- Navigation Buttons -->
    <div class="nav-buttons">
        <button class="homepage-button" onclick="window.location.href='../homepage.php'">Go to Homepage</button>
        <button class="appointment-button" onclick="window.location.href='appointment.html'">Give Appointment</button>
    </div>

    <div class="table-container">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Donor ID</th>
                        <th>Donor Name</th>
                        <th>Date of Birth</th>
                        <th>Blood Type</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Last Donation Date</th>
                        <th>Appointment Date</th>
                        <th>Donation Center</th>
                        <th>Donation Center Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data for each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td data-label='Donor ID'>" . $row['donor_id'] . "</td>
                                    <td data-label='Donor Name'>" . $row['name'] . "</td>
                                    <td data-label='Date of Birth'>" . $row['dob'] . "</td>
                                    <td data-label='Blood Type'>" . $row['blood_type'] . "</td>
                                    <td data-label='Phone'>" . $row['phone'] . "</td>
                                    <td data-label='Email'>" . $row['email'] . "</td>
                                    <td data-label='Last Donation Date'>" . $row['last_donation_date'] . "</td>
                                    <td data-label='Appointment Date'>" . $row['appointment_date'] . "</td>
                                    <td data-label='Donation Center'>" . $row['donation_center_name'] . "</td>
                                    <td data-label='Donation Center Address'>" . $row['donation_center_address'] . "</td>
                                    <td data-label='Status'>" . ucfirst($row['status']) . "</td>";

                            // Check the status to determine what to display in the Action column
                            if ($row['status'] == 'Approved') {
                                echo "<td data-label='Action'>Approved</td>";
                            } else {
                                echo "<td data-label='Action'>
                                        <form action='approve_appointment.php' method='post'>
                                            <input type='hidden' name='appointment_id' value='" . $row['donor_id'] . "'>
                                            <button type='submit'>Approve</button>
                                        </form>
                                      </td>";
                            }

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='12'>No appointments found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
