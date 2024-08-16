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

    echo '<article id="comments-article">';   
        echo '<div>';
            echo '<b>' . $user['username'] . '</b>';
            echo '<p>' . $comment['body'] . '</p>';
        echo '</div>';

        if($isAdmin):
            ?> <button
                id="delete-button"
                hx-delete="/delete-comment/<?= $comment['id'] ?>"
                hx-confirm="Really delete this comment?"
                class="danger"
            >
                <p>&nbsp;❌&nbsp;</p>
            </button> <?php
        endif;
    echo '</article>';
}