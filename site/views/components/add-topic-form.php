<!-- Add topic form -->

<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

// Connect to DB
$db = connectToDB();

// Get category from URL
$query = 'SELECT * FROM categories WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);
$categories = $stmt->fetchAll();

?>

<article>
    <form
        hx-post="/add-topic/<?=$id?>"
        hx-trigger="submit"
        enctype="multipart/form-data"
    >
        <h2>New Topic</h2>

        <input name="title" type="text" placeholder="Title" maxlength="64" required>

        <textarea name="body" type="text" rows="10" placeholder="Body" required></textarea>

        <input type="submit" value="Add">

    </form>
</article>