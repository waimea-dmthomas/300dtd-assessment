<!-- Delete selected topic -->

<?php

require_once 'lib/db.php';

// Check for topic ID
if (!$id) die ("No topic ID supplied");

// Connect to DB
$db = connectToDB();

// Get topic from URL
$query = 'SELECT * FROM topics WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);
$topic = $stmt->fetch();

$category = $topic['category'];

// Delete comments
$query = 'DELETE FROM comments WHERE topic = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);

// Delete topic
$query = 'DELETE FROM topics WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);

// Redirect to category
header("HX-Redirect: ../category/" . $category . " ");