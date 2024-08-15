<?php require_once 'lib/globals.php'; ?>

<?php if ($isLoggedIn): ?>
    <h1>Hello, <i><?=$userName?></i></h1>
<?php else: ?>
    <h1>Forums</h1>
<?php endif ?>

<section 
    id="categories-list"
    hx-get="/forum"
    hx-trigger="load"
>
</section>

<?php if ($isAdmin): ?>
    <details id="main-forums">
        <summary role="button" >Add Category</summary>
        <section hx-get="/add-category" hx-trigger="load"></section>
    </details>
<?php endif ?>