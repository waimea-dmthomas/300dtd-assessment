<!-- Main navigation menu. Can add logic for user type / access -->

<?php require_once 'lib/globals.php'; ?>

<nav id="main-nav">

    <menu hx-boost="true">

        <li><a role="button" href="/">Forum</a>
        <li><a role="button" href="/users">Users</a>
        
        <?php if ($isLoggedIn): ?>
            <li><a role="button" href="/profile/<?= $userId ?>">Profile</a>
        <?php endif ?>

        <?php if ($isAdmin): ?>
            <li><a role="button" href="/admin">Admin</a>
        <?php endif ?>

        <?php if ($isLoggedIn): ?>
            <li><a role="button" hx-post="/logout" hx-confirm="Are you sure you want to logout?" href="/logout">Logout</a>
        <?php else: ?>
            <li><a role="button" href="/login">Log In</a>
            <li><a role="button" href="/signup">Sign Up</a>
        <?php endif ?>

    </menu>

</nav>


<!-- Update the nav links -->
<script>configureNav();</script>