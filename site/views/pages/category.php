<!-- Show a given category -->

<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

$db = connectToDB();

$query = 'SELECT * FROM categories WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);
$categories = $stmt->fetchAll();

foreach($categories as $category) {
    echo '<article id="topics">';
        echo '<div id="category-header">'
            ?> <a role="button" href="/" id="back-button">◀</a><?php
            echo '<h1>' . $category['title'] . '</h1>';
        echo '</div>'

        ?> <section 
            hx-get="/list-topics/<?=$category['id']?>"
            hx-trigger="load">
        </section> <?php
        
        if ($isLoggedIn): ?>
            <button id="add-topic-button" hx-get="/add-topic-form/<?=$category['id']?>" hx-target="#topics" hx-swap="outerHTML">New Topic</button> 
        <?php endif;        
    echo '</article>';
}


