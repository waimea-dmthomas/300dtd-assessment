<!-- Generate a list of users and admin options-->

<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

if (!$isAdmin) header('HX-Redirect: ' . SITE_BASE . '/');

// Connect to DB
$db = connectToDB();

// Get all users
$query = 'SELECT * FROM users ';
$stmt = $db->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll();

consoleLog($users, 'DB Data');

echo '<table id="main-users">';

    echo '<tr>';
        echo '<th>Username</th>';
        echo '<th>Admin</th>';
        echo '<th>Moderator</th>';
        echo '<th>Delete?</th>';
    echo '</tr>';

    foreach($users as $user) {
        echo '<tr>';

            echo '<td>';
                echo $user['username'];
            echo '</td>';

            echo '<td>';
                if ($isAdmin) {
                    if($user['admin']) echo ' ' . '<a href="process-admin.php?id=' . $user['id'] . '">Yes</a>';
                    else echo  ' ' . '<a href="process-admin.php?id=' . $user['id'] . '">No</a>';
                }
                else {
                    if($user['admin']) echo ' ' . '<p>Yes</p>';
                    else echo  ' ' . '<p>No</p>';
                }
            echo '</td>';

            echo '<td>';
                if ($isAdmin) {
                    if($user['moderator']) echo ' ' . '<a href="process-moderator.php?id=' . $user['id'] . '">Yes</a>';
                    else echo  ' ' . '<a href="process-moderator.php?id=' . $user['id'] . '">No</a>';
                }
                else {
                    if($user['moderator']) echo ' ' . '<p>Yes</p>';
                    else echo  ' ' . '<p>No</p>';
                }
            echo '</td>';

            echo '<td>';
            echo ' ' . '<a href="delete-user.php?id=' . $user['id'] . '"onclick="return confirm(`Are you sure?`)">X</a>';
            echo '</td>';

        echo '</tr>';
    }
echo '</table>';