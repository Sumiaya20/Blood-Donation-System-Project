<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Sign Up - Blood Donation System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Blood Donation System</h1>
    </header>

    <div class="container">
        <div class="form-container">
            <!-- Login Form -->
            <div id="login-form">
                <h2>Login</h2>
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="username" class="input-field" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="input-field" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn">Login</button>
                    </div>
                </form>
                <div class="switch-link">
                    <p>New user? <a href="javascript:void(0)" onclick="toggleForm()">Sign up here</a></p>
                </div>
            </div>

            <!-- Sign-Up Form (hidden initially) -->
            <div id="signup-form" style="display: none;">
                <h2>Sign Up</h2>
                <form action="signup.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="username" class="input-field" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="input-field" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn">Sign Up</button>
                    </div>
                </form>
                <div class="switch-link">
                    <p>Already a user? <a href="javascript:void(0)" onclick="toggleForm()">Login here</a></p>
                </div>
            </div>

            <!-- Error Message (if any) -->
            <?php
            if (isset($_GET['error'])) {
                echo "<div class='error-message'>Invalid username or password.</div>";
            }
            ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Blood Donation System</p>
    </footer>

    <script>
        // Function to toggle between Login and Sign-Up form
        function toggleForm() {
            var loginForm = document.getElementById('login-form');
            var signupForm = document.getElementById('signup-form');
            if (loginForm.style.display === "none") {
                loginForm.style.display = "block";
                signupForm.style.display = "none";
            } else {
                loginForm.style.display = "none";
                signupForm.style.display = "block";
            }
        }
    </script>
</body>
</html>




