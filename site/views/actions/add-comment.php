<!-- Add a new category when user submits add comment form -->

<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

// Get data from the form
$body = $_POST['body'];
$op = $userId;

// Connect to DB
$db = connectToDB();

// Add the category
$query = 'INSERT INTO comments(body, op, topic)
VALUES (?, ?, ?)';

$stmt = $db->prepare($query);
$stmt->execute([$body, $op, $topic]);

// Redirect to topic
header('HX-Redirect: ' . $topic);