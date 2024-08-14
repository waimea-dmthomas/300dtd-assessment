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

    if($isAdmin):
        echo '<article id="topic-admin-panel">';
        ?>
            <button
                hx-put="/process-lock-topic/<?= $topic['id'] ?>"
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
        hx-get="/add-comment-form/<?=$id?>"
        hx-trigger="load"></div>';
        else echo '<p id="add-topic-button"><a href="../login">Login</a> or <a href="../signup">Sign Up</a> to add a comment!</p>';
        
        ?>
            <div  
                id="comments-div"
                hx-get="/list-comments/<?=$id?>"
                hx-trigger="load"
            >
            </div>
        <?php
    echo '</article>';
}


