<?php
// Enable error reporting
error_reporting();

include('./includes/config.php');
include('./template/ahkweb/forgot_password.php');


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

// Function to generate a random OTP
function generateRandomOTP($length = 6) {
    return rand(pow(10, $length - 1), pow(10, $length) - 1); // Generate a random number with given length
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone']; // Get phone number from user input
    $otp = generateRandomOTP(); // Generate a random OTP

    // Prepare to fetch user details from the database
    $sqlFetch = "SELECT * FROM `users` WHERE `phone` = ?";
    $stmtFetch = $conn->prepare($sqlFetch);
    $stmtFetch->bind_param("s", $phone);
    
    // Execute the statement
    if ($stmtFetch->execute()) {
        $result = $stmtFetch->get_result();
        
        // Check if user exists
        if ($result->num_rows > 0) {
            // Update OTP in the database
            $sqlUpdateOTP = "UPDATE `users` SET `otp` = ? WHERE `phone` = ?";
            $stmtUpdateOTP = $conn->prepare($sqlUpdateOTP);
            $stmtUpdateOTP->bind_param("ss", $otp, $phone);

            // Execute the statement
            if ($sqlUpdateOTP->execute()) {
                echo "User OTP updated successfully.<br>";

                // Send OTP via SMS
                $api_key = 'GMgNkjQ8vzB5rNzwojRuHT6TEvLFxv';
                $sender = '918742078513';
                $message = "$otp is your Instant Find password reset code";
                $url = "https://wa.apizone.live/send-message?api_key=$api_key&sender=$sender&number=91$phone&message=" . urlencode($message);
                $response = file_get_contents($url);
                
                if ($response === FALSE) {
                    echo "Error sending SMS.<br>";
                } else {
                    echo "<script>alert('OTP sent successfully to 91$phone');</script>";
                }
            } else {
                echo "Error updating OTP: " . $stmtUpdateOTP->error; // Show SQL error
            }
            // Close the OTP update statement
            $stmtUpdateOTP->close();
        } else {
            echo "<script>alert('No user found with the provided mobile number');</script>";
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
