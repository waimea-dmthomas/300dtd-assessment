<!-- Add a new account to the database when user submits signup form -->

<?php

require_once 'lib/db.php';

// Get data from the form
$user = $_POST['user'];
$pass = $_POST['pass'];
$iconFile = "images/default.png";

// Hash the supplied password
$hash = password_hash($pass, PASSWORD_DEFAULT);
consoleLog($hash, 'Hashed Password');

// Get uploaded image data
$iconData = file_get_contents($iconFile);

// Timestamp join date
$joined = date("j/" . "m/" . "Y");

// Connect
$db = connectToDB();

// Try to find a user account with the given username
$query = 'SELECT * FROM users WHERE username = ?';
$stmt = $db->prepare($query);
$stmt->execute([$user]);
$userData = $stmt->fetch();

if (!$userData) {
    // Add the user account
    $query = 'INSERT INTO users(username, hash, iconFile, joined)
    VALUES (?, ?, ?, ?)';

    $stmt = $db->prepare($query);
    $stmt->execute([$user, $hash, $iconData, $joined]);

    ?>
        <section  
            hx-get="/login-complete"
            hx-swap="innerHTML"
            hx-target="#login-form"
            hx-trigger="load"
        ></section>
    <?php
}
else {
    echo '<p>Username taken!</p>';
}