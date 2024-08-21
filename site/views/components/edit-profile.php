<!-- Show options for profile editing -->

<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

// Connect to DB
$db = connectToDB();

// Get user from URL
$query = 'SELECT * FROM users WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);
$user = $stmt->fetch();

// Edit profile form
?>
<form
    hx-post="/process-edit-profile/<?=$id?>"
    hx-trigger="submit"
    enctype="multipart/form-data"
>   
    <article id="profile-article">
        <header id="profile-header">
            <?php
                // Profile header
                echo '<div id="profile-header-info">';
                    echo '<div id="profile-header-name">';
                        echo ' ' . $user['username'] . "'s Profile" . ' ';
                        if($user['admin']) echo '<img id="admin-icon" src="../images/admin.png" width="25px" title="Admin">';
                        if($user['moderator']) echo '<img id="moderator-icon" src="../images/moderator.png" width="25px" title="Moderator">';
                    echo '</div>';
                    echo '<i>' . $user['status'] . '</i>';
                echo '</div>'; 

                // Confirm edits
                echo '<input class="confirm-button" id="edit-profile" type="submit" value="Confirm"></input>';
                echo '<a role="button" id="edit-profile-cancel" href="/profile/' . $id . '">Cancel</a>';
            ?>
        </header>
        
        <label>Profile Picture</label>
        <input name="icon" type="file" accept="image/*"></input>
        <!-- <input name="status" type="text"></input> -->
    </article>
</form>
