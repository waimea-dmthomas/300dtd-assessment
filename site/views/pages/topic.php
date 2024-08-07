<!-- Show a given topic -->

<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

$db = connectToDB();

$query = 'SELECT * FROM topics WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);
$topics = $stmt->fetchAll();

foreach($topics as $topic) {
    echo '<article>';
        echo '<h1>' . $topic['title'] . '</h1>';
        echo '<p>' . $topic['body'] . '</p>';   
    echo '</article>';

    echo '<article>';
        echo '<h1>Comments</h1>';
    echo '</article>';
}


