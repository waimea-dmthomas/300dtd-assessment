<!-- Delete selected user's account -->

<?php

require_once 'lib/db.php';

// Check for user ID
if (!$id) die ("No user ID supplied");

// Connect to DB
$db = connectToDB();

// Get user from URL
$query = 'DELETE FROM users WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);

// Redirect to admin panel
header('HX-Redirect: admin');