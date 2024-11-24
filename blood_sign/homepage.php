<?php
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

// Display homepage
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage - Blood Donation System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Blood Donation System</h1>
    </header>

    <div class="container">
        <div class="homepage-container">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
            <p>Thank you for being a part of the Blood Donation System. Together, we can make a difference!</p>

            <div class="dashboard">

            <div class="dashboard-item">
                    <h3>Blood Donation Appointment</h3>
                    <p>Do you want to donate blood? Please give appointment.</p>
                    <a href="appointment/appointment_list.php" class="btn">Appointment</a>
                </div>

                <div class="dashboard-item">
                    <h3>Blood Donation History</h3>
                    <p>View the blood donation history.</p>
                    <a href="history/donation_history.php" class="btn">History</a>
                </div>

                <div class="dashboard-item">
                    <h3> View Blood List </h3>
                    <p>If You want View The Blood List.</p>
                    <a href="view_blood_list.php" class="btn">View Blood List</a>
                </div>
                <div class="dashboard-item">
                    <h3>Contact Us</h3>
                    <p>Need blood? contact with us.</p>
                    <a href="contact_us.php" class="btn">Request Blood</a>
                </div>

                <div class="dashboard-item">
                    <h3>About</h3>
                    <p>If You Want,You can Know About us.</p>
                    <a href="know_about.php" class="btn">Request Blood</a>
                </div>

                
            </div>

            <div class="logout">
                <a href="logout.php" class="btn logout-btn">Logout</a>
            </div>
        </div>
    </div>

    
</body>
</html>


