<!-- Add a new account to the database when user submits signup form -->

<?php

require_once 'lib/db.php';

// // Check for upload error
// $error = $_FILES['icon']['error'];
// if ($error) die('Error uploading picture');

// Get data from the form
$user = $_POST['user'];
$pass = $_POST['pass'];
// $iconFile = $_FILES['icon']['tmp_name'];
// $iconType = $_FILES['icon']['type'];
$iconFile = "images/default.png";

// // Check if icon is an actual image (excluding SVG which are text files)
// if( $iconType != 'image/svg+xml' ) {
//     $validImage = getimagesize( $iconFile );
//     if( !$validImage ) die( 'Not an image file!' );
// }

// // Check the image is of a suitable type
// if( $iconType != 'image/svg+xml' &&
//     $iconType != 'image/png'     &&
//     $iconType != 'image/jpeg'    &&
//     $iconType != 'image/gif'     &&
//     $iconType != 'image/webp' ) die( 'Only images are allowed' );

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