<!-- Generate a list of comments-->

<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

// Connect to DB
$db = connectToDB();

// Get comments from topic
$query = 'SELECT * FROM comments WHERE topic = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);
$comments = $stmt->fetchAll();

// Loop through comments
foreach($comments as $comment) {

    // Get comment OP
    $op = $comment['op'];

    $query2 = "SELECT * FROM users WHERE id = '$op'";
    $stmt2 = $db->prepare($query2);
    $stmt2->execute();
    $user = $stmt2->fetch();

    // Echo comment article
    echo '<article id="comments-article">'; 
    
        // Comment op
        echo '<div>';
            echo '<b>' . $user['username'] . '</b>';
            echo '<p>' . $comment['body'] . '</p>';
        echo '</div>';

        // Admin delete button
        if($isAdmin):
            ?> <button
                class="delete-button"
                hx-delete="/delete-comment/<?= $comment['id'] ?>"
                hx-confirm="Really delete this comment?"
            >
                <p>&nbsp;❌&nbsp;</p>
            </button> <?php
        endif;
    echo '</article>';
}