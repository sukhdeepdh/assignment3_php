<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}
?>

<h2>Welcome, <?php echo $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']; ?></h2>
<p>Your email: <?php echo $_SESSION['user']['email']; ?></p>
