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
                if($user['admin']) echo ' <img src="images/admin.png" width="25px" title="Admin">';
                if($user['moderator']) echo ' <img src="images/moderator.png" width="25px" title="Moderator">';
            echo '</td>';

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

            echo '<td>';
                ?>
                    <p>
                        <button
                            id="delete-button"
                            hx-delete="/delete-user/<?= $user['id'] ?>"
                            hx-confirm="Really delete this user?"
                            class="danger"
                        >
                            Delete User
                        
                        </button>
                    </p>
                <?php
            echo '</td>';

        echo '</tr>';
    }
echo '</table>';