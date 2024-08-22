<!-- Make selected user a moderator -->

<?php

require_once 'lib/db.php';

// Connect
$db = connectToDB();

// Set moderator to opposite of value
$query = 'UPDATE users SET moderator = NOT moderator WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);

// Redirect to admin panel
header('HX-Redirect: admin');

