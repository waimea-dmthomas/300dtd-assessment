<!-- Log the user in when they submit the login form -->

<?php   

require_once 'lib/db.php';

// Connect to DB
$db = connectToDB();

// Get data from form
$pass = $_POST['password'];
$user = $_POST['username'];

// Get user account with given username
$query = 'SELECT * FROM users WHERE username = ?';
$stmt = $db->prepare($query);
$stmt->execute([$user]);
$userData = $stmt->fetch();

// Did we actually get a user account?



if ($userData) {
    // Check is user is banned
    if ($userData['banned']) {
        echo '<b>User has been banned!</b>';
    }
    else {
        // Verify password and hash
        if (password_verify($pass, $userData['hash'])) {

            // We got here, so user and password both ok
            $_SESSION['user']['loggedIn'] = true;

            // Save user info for later use
            $_SESSION['user']['admin'] = $userData['admin'];
            $_SESSION['user']['moderator'] = $userData['moderator'];
            $_SESSION['user']['username'] = $userData['username'];
            $_SESSION['user']['id'] = $userData['id'];

            // Redirect to forum
            header('HX-Redirect: ' . SITE_BASE);
        }
        else {
            echo '<b>Incorrect password!</b>';
        }
    }
}
else {
    echo "<b>This account doesn't exist!</b>";
}