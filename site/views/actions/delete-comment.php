<!-- Delete selected comment -->

<?php

require_once 'lib/db.php';

// Check for comment ID
if (!$id) die ("No comment ID supplied");

// Connect to DB
$db = connectToDB();

// Get comment from URL
$query = 'SELECT * FROM comments WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);
$comment = $stmt->fetch();

$topic = $comment['topic'];

// Delete comment
$query = 'DELETE FROM comments WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);

// Redirect to topic
header("HX-Redirect: ../topic/" . $topic . " ");