<!-- Delete selected topic -->

<?php

require_once 'lib/db.php';

if (!$id) die ("No topic ID supplied");

$db = connectToDB();

// Try to find a user account with the given username
$query = 'SELECT * FROM topics WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);
$topic = $stmt->fetch();

$category = $topic['category'];

$query = 'DELETE FROM topics WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);

header("HX-Redirect: ../category/" . $category . " ");