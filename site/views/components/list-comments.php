<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

$db = connectToDB();

$query = 'SELECT * FROM comments WHERE topic = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);
$comments = $stmt->fetchAll();

foreach($comments as $comment) {
    $commentOp = $comment['op'];

    $query2 = "SELECT * FROM users WHERE id = '$commentOp'";
    $stmt2 = $db->prepare($query2);
    $stmt2->execute();
    $user = $stmt2->fetch();

    echo '<article>';   
        echo '<b>' . $user['username'] . '</b>';
        echo '<p>' . $comment['body'] . '</p>';
    echo '</article>';
}