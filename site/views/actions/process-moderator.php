<!-- Make selected user a moderator -->

<?php

require_once 'lib/db.php';

// Connect
$db = connectToDB();

// Try to find a category with the given title
$query = 'UPDATE users SET moderator = NOT moderator WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);

header('HX-Redirect: admin');

