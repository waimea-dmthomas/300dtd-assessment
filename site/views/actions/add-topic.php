<!-- Opens a new topic when user submits new topic form -->

<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

// Get data from the form
$title = $_POST['title'];
$body = $_POST['body'];
$op = $userId;

// Connect
$db = connectToDB();

// Add new topic
$query = 'INSERT INTO topics(title, body, op, category)
VALUES (?, ?, ?, ?)';

$stmt = $db->prepare($query);
$stmt->execute([$title, $body, $op, $category]);

header('HX-Redirect: ' . $category);
