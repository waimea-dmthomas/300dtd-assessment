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
    $op = $topic['op'];

    $query2 = "SELECT * FROM users WHERE id = '$op'";
    $stmt2 = $db->prepare($query2);
    $stmt2->execute();
    $user = $stmt2->fetch();

    echo '<article id="topic-header">';
        echo '<h1>' . $topic['title'] . '</h1>';
        echo '<p id="topic-op">Posted by ' . '<a href="/profile/' . $user['id'] . '">' . $user['username'] . '</a>' . '</p>';
        echo '<p>' . $topic['body'] . '</p>';   
    echo '</article>';

    if($isAdmin):
        echo '<article id="topic-admin-panel">';
        ?>
            <button
                hx-put="/lock-topic/<?= $topic['id'] ?>"
            >
                <?php
                    if ($topic['locked']) {
                        echo 'Unlock Topic';
                    }
                    else {
                        echo 'Lock Topic';
                    }
                ?>
            </button>

            <button
                hx-put="/pin-topic/<?= $topic['id'] ?>"
            >
                <?php
                    if ($topic['pinned']) {
                        echo 'Unpin Topic';
                    }
                    else {
                        echo 'Pin Topic';
                    }
                ?>
            </button>

            <button
                id="delete-button"
                hx-delete="/delete-topic/<?= $topic['id'] ?>"
                hx-confirm="Really delete this topic?"
                class="danger"
            >
                <?php
                    echo 'Delete Topic'
                ?>
            </button>
        <?php
        echo '</article>';
    endif;

    echo '<article>';
        echo '<h1>Comments</h1>';

        if($topic['locked']) echo '<b>This topic is locked!</b>';
        elseif($isLoggedIn) echo '<div
            hx-get="/add-comment/' . $id . '"
            hx-trigger="load"></div>';
        else echo '<p id="add-topic-button"><a href="../login">Login</a> or <a href="../signup">Sign Up</a> to add a comment!</p>';
        
        ?>
            <div  
                id="comments-div"
                hx-get="/comments/<?=$id?>"
                hx-trigger="load"
            >
            </div>
        <?php
    echo '</article>';
}


