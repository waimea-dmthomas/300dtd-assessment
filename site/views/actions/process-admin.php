<!-- Make selected user an admin -->

<?php

require_once 'lib/db.php';

// Connect
$db = connectToDB();

// Try to find a category with the given title
$query = 'UPDATE users SET admin = NOT admin WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);

header('HX-Redirect: admin');

