<!-- Add a new category when admin submits add category form -->

<?php

// if (!$isAdmin) header('HX-Redirect: ' . SITE_BASE . '/');

require_once 'lib/db.php';

// Get data from the form
$title = $_POST['title'];
$description = $_POST['description'];

// Connect
$db = connectToDB();

// Try to find a category with the given title
$query = 'SELECT * FROM categories WHERE title = ?';
$stmt = $db->prepare($query);
$stmt->execute([$category]);
$categoryData = $stmt->fetch();

if (!$categoryData) {
    // Add the category
    $query = 'INSERT INTO categories(title, description)
    VALUES (?, ?)';

    $stmt = $db->prepare($query);
    $stmt->execute([$title, $description]);
    header('HX-Redirect: ' . SITE_BASE);
}
else {
    echo '<h2>Category already exists!</h2>';
    echo '<h3><a href="/">Try again</a></h3>';
}