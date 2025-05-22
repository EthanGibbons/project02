<html>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <?php
        include 'header.inc';
        ?>
        <link rel="stylesheet" href="styles/styles.css">
        <title>Login</title>
    <
<body>
<?php
session_start();
require_once("settings.php");
?>
    <section id ="login">
    <h1>Login</h1>
    <?php 
     if (isset($_SESSION['error'])) {
        echo "<p style='color:red;'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }
    ?>
    <form action="process_login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        
        <input type="submit" value="Login">
    </form>
</section>
<?php
include 'footer.inc';
?>
</body>
    </html>
