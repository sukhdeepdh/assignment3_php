<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Charity Website</title>
</head>
<body>
<div id="container">
<header id="banner">
    <h1>Charity Organization</h1>
    <h3>Support Our Cause</h3>
</header>
<div id="nav">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="member.php">Member</a></li>
        <?php if (!isset($_SESSION['user'])): ?>
            <li><a href="register.php">Register</a></li>
        <?php else: ?>
            <li><a href="logout.php">Logout</a></li>
        <?php endif; ?>
        <li><a href="contact.php">Contact</a></li>
    </ul>
</div>
<div class="main-content">
