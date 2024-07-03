<h1>Categories</h1>

<section  
    hx-get="/list-categories"
    hx-trigger="load"
>
</section>

<?php if ($isAdmin): ?>
    <details id="main-forums">
        <summary role="button" >Add Category</summary>
        <section hx-get="/add-category-form" hx-trigger="load"></section>
    </details>
<?php endif ?>