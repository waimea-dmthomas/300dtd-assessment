<!-- Show a given user's profile -->

<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

$db = connectToDB();

$query = 'SELECT * FROM users WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);
$users = $stmt->fetchAll();

foreach($users as $user) {
    echo '<h2>' . $user['username'] . "'s Profile</h2>";
}

