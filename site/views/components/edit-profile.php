<!-- Show options for profile editing -->

<?php

require_once 'lib/db.php';
require_once 'lib/globals.php';

$db = connectToDB();

$query = 'SELECT * FROM users WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$id]);
$user = $stmt->fetch();

?>
    <form
        hx-put="/process-edit-profile/<?=$id?>"
        hx-trigger="submit"
        enctype="multipart/form-data"
    >   
        <article id="profile-article">
            <header id="profile-header">
                <?php
                    echo '<div id="profile-header-info">';
                        echo '<div id="profile-header-name">';
                            echo ' ' . $user['username'] . "'s Profile" . ' ';
                            if($user['admin']) echo '<img id="admin-icon" src="../images/admin.png" width="25px" title="Admin">';
                            if($user['moderator']) echo '<img id="moderator-icon" src="../images/moderator.png" width="25px" title="Moderator">';
                        echo '</div>';
                        echo '<i>' . $user['status'] . '</i>';
                    echo '</div>'; 
                ?>

                <input type="submit" value="Confirm" id="edit-profile"></input>
                <a role="button" id="edit-profile-cancel" href="/profile/<?=$id?>">Cancel</a>
            </header>
            
            <label>Icon</label>
            <input name="icon" type="file" accept="image/*"></input>
        </article>
    </form>

