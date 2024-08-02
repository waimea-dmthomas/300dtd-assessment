<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

$db = connectToDB();

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

        <input name="title" type="text" placeholder="Title" required>

        <input name="body" type="text" placeholder="Body" required></input>

        <input type="submit" value="Add">

    </form>
</article>