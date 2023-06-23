<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input fields
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $message = test_input($_POST["message"]);

    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        // Handle validation errors
        echo "Please fill in all the required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email format
        echo "Invalid email format.";
    } else {
        // Send email
        $to = "rehman9788.com";  // Replace with your email address
        $subject = "New form submission";
        $body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message";

        if (mail($to, $subject, $body)) {
            echo "Thank you for your submission. We will contact you shortly.";
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
