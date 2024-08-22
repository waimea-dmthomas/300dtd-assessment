<!-- Generate a list of topics-->

<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

// Connect to DB
$db = connectToDB();

// Get all topics
$query = "SELECT * FROM topics WHERE category = '$id' ORDER BY (pinned = '1') DESC, pinned, timestamp DESC";
$stmt = $db->prepare($query);
$stmt->execute();
$topics = $stmt->fetchAll();

if($stmt->rowCount() > 0) {
    echo '<section>';

        // Loop through topics
        foreach($topics as $topic) {
            
            // Get topic op
            $op = $topic['op'];

            $query2 = "SELECT * FROM users WHERE id = '$op'";
            $stmt2 = $db->prepare($query2);
            $stmt2->execute();
            $user = $stmt2->fetch();
            
            // Echo topic
            echo '<a role="button" id="topic-article" href="/topic/' . $topic['id'] . '">';

                // Topic header
                echo '<div id="topic-article-header">';
                    echo '<h1>' . $topic['title'] . '</h1>';
                    if($topic['pinned']) echo '<p>📌</p>';
                    if($topic['locked']) echo '<p>🔒</p>';
                echo '</div>';

                // Topic body
                echo '<article id="topic-article-body">';
                    echo '<p>' . $topic['body'] . '</p>';
                echo '</article>';

                // Topic op
                echo '<div id="topic-article-op">';
                    if($user['banned']) echo '<p>Posted by Banned User ' . $user['id'] . '🚫</p>';
                    else echo '<p>Posted by ' . $user['username'] . '</p>';
                    if($user['admin']) echo '<img id="admin-icon" src="../images/admin.png" width="25px" height="25px" title="Admin">';
                echo '</div>';

                // Topic timestamp
                echo '<div id="topic-timestamp">';
                    echo '<p>' . time_elapsed_string($topic['timestamp']) . '</p>';
                echo '</div>';
            
            echo '</a>';
        }
    echo '</section>';

    // Count topics
    echo '<p><b>' . $stmt->rowCount() . '</b> topics thus far!</p>';
} else {
    echo '<b>No topics created!</b>';
}

