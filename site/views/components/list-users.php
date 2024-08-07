<!-- Generate a list of users-->

<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

// Connect to DB
$db = connectToDB();

// Get all users
$query = 'SELECT id, username, `admin`, moderator, iconFile, iconType FROM users ';
$stmt = $db->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll();

consoleLog($users, 'DB Data');

foreach($users as $user) {

    echo '<article>';
        ?>
            <img src="data:image/<?php $user["iconType"]?>;base64,<?php echo base64_encode($user["iconFile"]); ?>"
            height="50"
            width="50"
            alt="<?php $user["username"] . "'s Icon" ?>"
        ><?php

        echo ' ' . '<a href="/profile/' . $user['id'] . '">' . $user['username'] . '</a>' . ' ';
        if($user['admin']) echo '<img src="images/admin.png" width="25px" title="Admin">';
        if($user['moderator']) echo '<img src="images/moderator.png" width="25px" title="Moderator">';
    echo '</article>';
}