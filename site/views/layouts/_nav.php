<!-- Main navigation menu. Can add logic for user type / access -->

<?php require_once 'lib/globals.php'; ?>

<nav id="main-nav">

    <menu hx-boost="true">

        <li><a href="/">Forum</a>
        <li><a href="/users">Users</a>
        <li><a href="/profile">Profile</a>

        <?php if ($isAdmin): ?>
            <li><a href="/admin">Admin</a>
        <?php endif ?>

        <?php if ($isLoggedIn): ?>
            <li><a hx-post="/logout-user" href="/logout">Logout</a>
        <?php else: ?>
            <li><a href="/login">Log In</a>
            <li><a href="/signup">Sign Up</a>
        <?php endif ?>

    </menu>

</nav>


<!-- Update the nav links -->
<script>configureNav();</script>