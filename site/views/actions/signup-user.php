<!-- Add a new account to the database when user submits signup form -->

<?php

require_once 'lib/db.php';

$user = $_POST['user'];
$pass = $_POST['pass'];
$icon = $_POST['icon'];

// Hash the supplied password
$hash = password_hash($pass, PASSWORD_DEFAULT);
consoleLog($hash, 'Hashed Password');

// Connect
$db = connectToDB();

// Try to find a user account with the given username
$query = 'SELECT * FROM users WHERE username = ?';
$stmt = $db->prepare($query);
$stmt->execute([$user]);
$userData = $stmt->fetch();

if (!$userData) {
    // Add the user account
    $query = 'INSERT INTO users(username, hash, icon)
    VALUES (?, ?, ?)';

    $stmt = $db->prepare($query);
    $stmt->execute([$user, $hash]);

    echo '<h2>Account Created!</h2>';
    // Login page link
    echo '<h3><a href="login">Login</a></h3>';
}
else {
    echo '<h2>Username taken!</h2>';
    echo '<h3><a href="signup">Try again</a></h3>';
}