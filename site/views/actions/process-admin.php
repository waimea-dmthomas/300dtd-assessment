<!-- Make selected user an admin -->

<?php

require_once 'lib/db.php';

// Connect
$db = connectToDB();

// Set admin to opposite of value
$query = 'UPDATE users SET admin = NOT admin WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);

// Redirect to admin panel
header('HX-Redirect: admin');

