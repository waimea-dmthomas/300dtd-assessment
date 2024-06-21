<!-- Generate a list of users-->

<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

// Connect to DB
$db = connectToDB();

// Get all users
$query = 'SELECT * FROM users ';
$stmt = $db->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll();

consoleLog($users, 'DB Data');

foreach($users as $user) {
    echo '<article>';
        echo $user['username'];
        if($user['admin']) echo '<img src="images/admin.png" width="25px">';
    echo '</article>';
}