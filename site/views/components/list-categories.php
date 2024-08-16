<!-- Generate a list of categories-->

<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

// Connect to DB
$db = connectToDB();

// Get all categories
$query = 'SELECT * FROM categories';
$stmt = $db->prepare($query);
$stmt->execute();
$categories = $stmt->fetchAll();

consoleLog($categories, 'DB Data');

// Loop through categories
foreach($categories as $category) {
    echo '<a href="/category/' . $category['id'] . '" role="button">' . $category['title'] . '</a>';
    echo '<p>' . $category['description'] . '</p>';
}