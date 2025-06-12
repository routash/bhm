<?php
// Enable error reporting
error_reporting();
include('./includes/config.php');
include('./template/ahkweb/reset_password.php');


// Database connection
$host = 'localhost'; // Your database host
$db = 'u961178053_instantfind'; // Your database name
$user = 'u961178053_instantfind'; // Your database username
$pass = 'Instnat123#'; // Your database password

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone']; // Get phone number from form
    $otpEntered = $_POST['otp']; // Get OTP from form
    $newPassword = $_POST['new_password']; // Get new password from form
    $confirmPassword = $_POST['confirm_password']; // Get confirm password from form 

    // Prepare to fetch user details from the database
    $sqlFetch = "SELECT * FROM `users` WHERE `phone` = ?";
    $stmtFetch = $conn->prepare($sqlFetch);
    $stmtFetch->bind_param("s", $phone);

    // Execute the statement
    if ($stmtFetch->execute()) {
        $result = $stmtFetch->get_result();

        // Check if user exists
        if ($result->num_rows > 0) {
            $userData = $result->fetch_assoc();
            $otpStored = $userData['otp']; // Get the OTP stored in the database
            
            // Verify OTP
            if ($otpStored == $otpEntered) {
                // Check if the new password and confirm password match
                if ($newPassword === $confirmPassword) {
                    // Hash the new password (using password_hash for security)
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    // Prepare to update the password in the database
                    $sqlUpdatePassword = "UPDATE `users` SET `password` = ? WHERE `phone` = ?";
                    $stmtUpdatePassword = $conn->prepare($sqlUpdatePassword);
                    $stmtUpdatePassword->bind_param("ss", $hashedPassword, $phone);

                    // Execute the statement
                    if ($stmtUpdatePassword->execute()) {
                        echo '<script>alert("Password reset successfully")</script>';
                    } else {
                        echo "Error updating password: " . $stmtUpdatePassword->error; // Show SQL error
                    }
                    // Close the password update statement
                    $stmtUpdatePassword->close();
                } else {
                    echo "New password and confirm password do not match.<br>";
                }
            } else {
                echo "Invalid OTP entered.<br>";
            }
        } else {
            echo "No user found with the provided mobile number.<br>";
        }
    } else {
        echo "Error fetching user: " . $stmtFetch->error; // Show SQL error
    }
    // Close the fetch statement
    $stmtFetch->close();
}

// Close the database connection
$conn->close();
?>
