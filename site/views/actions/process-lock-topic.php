<!-- Make selected topic locked -->

<?php

require_once 'lib/db.php';

// Connect
$db = connectToDB();

// Try to find a topic with the given title
$query = 'UPDATE topics SET locked = NOT locked WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);

// Redirect to topic
header("HX-Redirect: " . $id . " ");