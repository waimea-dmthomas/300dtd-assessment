<!-- Generate a list of topics-->

<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

// Connect to DB
$db = connectToDB();

// Get all topics
$query = "SELECT * FROM topics WHERE category = '$id' ORDER BY (pinned = '1') DESC, pinned";
$stmt = $db->prepare($query);
$stmt->execute();
$topics = $stmt->fetchAll();

if($stmt->rowCount() > 0) {
    echo '<section>';
        foreach($topics as $topic) {
            
            $op = $topic['op'];

            // Get topic op
            $query2 = "SELECT * FROM users WHERE id = '$op'";
            $stmt2 = $db->prepare($query2);
            $stmt2->execute();
            $user = $stmt2->fetch();

            echo '<a role="button" id="topic-article" href="/topic/' . $topic['id'] . '">';
                echo '<div id="topic-article-header">';
                    echo '<h1>' . $topic['title'] . '</h1>';
                    if($topic['pinned']) echo '<p>📌</p>';
                    if($topic['locked']) echo '<p>🔒</p>';
                echo '</div>';

                echo '<article id="topic-article-body">';
                    echo '<p>' . $topic['body'] . '</p>';
                echo '</article>';

                echo '<div id="topic-article-op">';
                    echo '<p>Posted by ' . $user['username'] . '</p>';
                    // <a href="/profile/' . $user['id'] . '">' . $user['username'] . '</a>
                    if($user['admin']) echo '<img id="admin-icon" src="../images/admin.png" width="25px" title="Admin">';
                echo '</div>';
            echo '</a>';
        }
    echo '</section>';

    echo '<p><b>' . $stmt->rowCount() . '</b> topics thus far!</p>';
} else {
    echo '<b>No topics created!</b>';
}

