<!-- Log the user in when they submit the login form -->

<?php   

require_once 'lib/db.php';

$db = connectToDB();

$pass = $_POST['password'];
$user = $_POST['username'];

// Try to find a user account with the given username
$query = 'SELECT * FROM users WHERE username = ?';
$stmt = $db->prepare($query);
$stmt->execute([$user]);
$userData = $stmt->fetch();

// Did we actually get a user account?

if ($userData) {
    // Verify password and hash
    if (password_verify($pass, $userData['hash'])) {
        // We got here, so user and password both ok
        $_SESSION['user']['loggedIn'] = true;
        // Save user info for later use
        $_SESSION['user']['admin'] = $userData['admin'];
        $_SESSION['user']['username'] = $userData['username'];
        $_SESSION['user']['id'] = $userData['id'];
        // Head to home page
        header('HX-Redirect: ' . SITE_BASE);
    }
    else {
        echo '<h2>Incorrect password!</h2>';
    }
}
else {
    echo '<h2>User account does not exist!</h2>';
}