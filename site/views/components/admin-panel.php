<!-- Generate a list of users and admin options-->

<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

if (!$isAdmin) header('HX-Redirect: ' . SITE_BASE . '/');

// Connect to DB
$db = connectToDB();

// Get all users
$query = 'SELECT * FROM users';
$stmt = $db->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll();

consoleLog($users, 'DB Data');

// Echo admin panel
echo '<table id="main-users">';

    // Table header
    echo '<tr>';
        echo '<th>Username</th>';
        echo '<th>Admin</th>';
        echo '<th>Moderator</th>';
        echo '<th>Ban?</th>';
    echo '</tr>';

    // Loop through users
    foreach($users as $user) {
        echo '<tr>';

            // Usernames
            echo '<td>';
                echo $user['username'];
                if($user['admin']) echo ' <img src="images/admin.png" width="25px" title="Admin">';
                if($user['moderator']) echo ' <img src="images/moderator.png" width="25px" title="Moderator">';
                if($user['banned']) echo '🚫';
            echo '</td>';

            // Admin permissions
            echo '<td>';
                ?>
                    <p>
                        <button
                            hx-put="/process-admin/<?= $user['id'] ?>"
                            hx-confirm="Really give admin permissions to this user?"
                            class="danger"
                        >
                            <?php
                                if ($user['admin']) {
                                    echo 'Yes';
                                }
                                else {
                                    echo 'No';
                                }
                            ?>
                        </button>
                    </p>
                <?php
            echo '</td>';
            
            // Moderator permissions
            echo '<td>';
                ?>
                    <p>
                        <button
                            hx-put="/process-moderator/<?= $user['id'] ?>"
                            hx-confirm="Really give moderator permissions to this user?"
                            class="danger"
                        >
                            <?php
                                if ($user['moderator']) {
                                    echo 'Yes';
                                }
                                else {
                                    echo 'No';
                                }
                            ?>
                        </button>
                    </p>
                <?php
            echo '</td>';

            // Delete user
            echo '<td>';
                ?>
                    <p>
                        <button
                            class="delete-button"
                            hx-delete="/process-ban-user/<?= $user['id'] ?>"
                            hx-confirm="Really ban this user?"
                        >
                            <?php
                                if ($user['banned']) {
                                    echo 'Unban User';
                                }
                                else {
                                    echo 'Ban User';
                                }
                            ?>
                        </button>
                    </p>
                <?php
            echo '</td>';

        echo '</tr>';
    }
echo '</table>';