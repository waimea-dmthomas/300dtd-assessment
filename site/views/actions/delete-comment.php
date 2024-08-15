<!-- Delete selected comment -->

<?php

require_once 'lib/db.php';

if (!$id) die ("No comment ID supplied");

$db = connectToDB();

// Try to find a user account with the given username
$query = 'SELECT * FROM comments WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);
$comment = $stmt->fetch();

$topic = $comment['topic'];

$query = 'DELETE FROM comments WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);

header("HX-Redirect: ../topic/" . $topic . " ");