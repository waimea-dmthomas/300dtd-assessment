<!-- Ban user -->

<?php

require_once 'lib/db.php';

// Connect
$db = connectToDB();

// Try to find a category with the given title
$query = 'UPDATE users SET banned = NOT banned WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);

// Redirect to admin panel
header('HX-Redirect: admin');

