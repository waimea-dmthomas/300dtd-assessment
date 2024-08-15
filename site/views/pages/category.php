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

            if($isLoggedIn) { ?>
                <button id="add-topic-button" hx-get="/add-topic/<?=$category['id']?>" hx-target="#topics" hx-swap="outerHTML">New Topic</button> 
            <?php }
            else {
                echo '<p id="add-topic-button"><a href="../login">Login</a> or <a href="../signup">Sign Up</a> to open a topic!</p>';
            }
        echo '</div>';

        ?> <div 
            hx-get="/category/<?=$category['id']?>"
            hx-trigger="load">
        </div> <?php
    echo '</article>';
}