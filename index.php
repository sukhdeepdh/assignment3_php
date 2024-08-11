<?php
session_start();
require_once 'config/dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if ($email && !empty($password)) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->execute([$email, md5($password)]);
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();
            $_SESSION['user'] = $user;
            header('Location: member.php');
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Please fill in all fields.";
    }
}
?>

<div>
    <h2>Welcome to Our Charity</h2>
    <p>Our mission is to support those in need. Join us in making a difference.</p>

    <?php if (!isset($_SESSION['user'])): ?>
    <form method="post" action="index.php">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
        <?php if (isset($error)) echo "<p>$error</p>"; ?>
    </form>
    <?php endif; ?>
</div>
