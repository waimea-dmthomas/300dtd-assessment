<!-- Update user data when edit submitted -->

<?php

require_once 'lib/db.php';

// Check for upload error
$error = $_FILES['icon']['error'];
if ($error) die('Error uploading picture');

// Get data from the form
$iconFile = $_FILES['icon']['tmp_name'];
$iconType = $_FILES['icon']['type'];

// Check if icon is an actual image (excluding SVG which are text files)
if( $iconType != 'image/svg+xml' ) {
    $validImage = getimagesize( $iconFile );
    if( !$validImage ) die( 'Not an image file!' );
}

// Check the image is of a suitable type
if( $iconType != 'image/svg+xml' &&
    $iconType != 'image/png'     &&
    $iconType != 'image/jpeg'    &&
    $iconType != 'image/gif'     &&
    $iconType != 'image/webp' ) die( 'Only images are allowed' );

// Get uploaded image data
$iconData = file_get_contents($iconFile);

// Update the user data
$query = 'UPDATE users SET iconFile = iconFile, iconType = iconType WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);