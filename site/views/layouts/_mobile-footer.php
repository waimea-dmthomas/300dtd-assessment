<!-- Footer section content -->

    <a role="button" href="/">Forum</a>
    <a role="button" href="/users">Users</a>
    
    <?php if ($isLoggedIn): ?>
        <a role="button" href="/profile/<?= $userId ?>">Profile</a>
    <?php endif ?>

    <?php if ($isAdmin): ?>
        <a role="button" href="/admin">Admin</a>
    <?php endif ?>

    <?php if ($isLoggedIn): ?>
        <a role="button" hx-post="/logout" hx-confirm="Are you sure you want to logout?" href="/logout">Logout</a>
    <?php else: ?>
        <a role="button" href="/login">Log In</a>
        <a role="button" href="/signup">Sign Up</a>
    <?php endif ?>