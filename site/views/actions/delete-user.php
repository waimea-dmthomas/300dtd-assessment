<!-- Delete selected user's account -->

<?php

require_once 'lib/db.php';

if (!$id) die ("No user ID supplied");

$db = connectToDB();

$query = 'DELETE FROM users WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);

header('HX-Redirect: admin');