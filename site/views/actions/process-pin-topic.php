<!-- Make selected topic pinned -->

<?php

require_once 'lib/db.php';

// Connect
$db = connectToDB();

// Try to find a topic with the given title
$query = 'UPDATE topics SET pinned = NOT pinned WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);

// Redirect to admin panel
header("HX-Redirect: " . $id . " ");

