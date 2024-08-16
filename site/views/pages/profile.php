<!-- Show a given user's profile -->

<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

// Connect to DB
$db = connectToDB();

// Get profile user
$query = 'SELECT * FROM users WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);
$users = $stmt->fetchAll();

// Loop through users
foreach($users as $user) {

    // Get amount of topics
    $query2 = "SELECT * FROM topics WHERE op = '$id'";
    $stmt2 = $db->prepare($query2);
    $stmt2->execute();
    $topic = $stmt2->fetch();

    // Get amount of comments
    $query3 = "SELECT * FROM comments WHERE op = '$id'";
    $stmt3 = $db->prepare($query3);
    $stmt3->execute();
    $comment = $stmt3->fetch();

    // Echo profile
    echo '<article id="profile-article">';

        // Profile header
        echo '<header id="profile-header">';
            echo '<div id="profile-header-info">';
                echo '<div id="profile-header-name">';
                    echo ' ' . $user['username'] . "'s Profile" . ' ';
                    if($user['admin']) echo '<img id="admin-icon" src="../images/admin.png" width="25px" title="Admin">';
                    if($user['moderator']) echo '<img id="moderator-icon" src="../images/moderator.png" width="25px" title="Moderator">';
                echo '</div>';

                echo '<i>' . $user['status'] . '</i>';
            echo '</div>';

            if($user['id'] == $userId) {
                echo '<button id="edit-profile" hx-get="/edit-profile/' . $id . '" hx-target="#profile-article" hx-swap="outerHTML">Edit Profile</button>';
            }
        echo '</header>';
        
        // Profile body
        echo '<div id="profile-body">';
            ?>
                <img src="data:image/<?php $user["iconType"]?>;base64,<?php echo base64_encode($user["iconFile"]); ?>"
                height="250"
                width="250"
                alt="<?php $user["username"] . "'s Icon" ?>"
            ><?php

            echo '<div id="profile-info">';
                echo '<p>Member since: ' . $user['joined'] . '</p>';
                echo '<p>Topics opened: ' . $stmt2->rowCount() . '</p>';
                echo '<p>Comments left: ' . $stmt3->rowCount() . '</p>';
            echo '</div>';

        echo '</div>';

    echo '</article>';
}

