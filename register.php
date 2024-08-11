<?php
session_start();
require_once 'config/dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if ($firstName && $lastName && $email && !empty($password)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() == 0) {
            $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
            $stmt->execute([$firstName, $lastName, $email, md5($password)]);
            header('Location: member.php');
            exit;
        } else {
            $error = "Email already registered.";
        }
    } else {
        $error = "Please fill in all fields.";
    }
}
?>

<form method="post" action="register.php">
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" required>
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" required>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <button type="submit">Register</button>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</form>
