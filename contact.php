<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['full_name'];
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $message = $_POST['message'];

    if ($name && $email && $message) {
        // You can implement email functionality here
        echo "<p>Thank you for your message, $name.</p>";
    } else {
        echo "<p>Please fill in all fields.</p>";
    }
}
?>

<form method="post" action="contact.php">
    <label for="full_name">Full Name:</label>
    <input type="text" name="full_name" required>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="message">Message:</label>
    <textarea name="message" required></textarea>
    <button type="submit">Send Message</button>
</form>
