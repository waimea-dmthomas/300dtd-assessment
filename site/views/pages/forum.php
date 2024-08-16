<!-- List categories -->

<?php
    // Welcome message
    require_once 'lib/globals.php'; 

    if ($isLoggedIn) {
        echo '<h1>Hello, <i>' . $userName . '</i></h1>';
    }
    else {
        echo '<h1>Forums</h1>';
    }

    // Load category list
    echo '<section 
        id="categories-list"
        hx-get="/forum"
        hx-trigger="load">';
    echo '</section>';

    // Admin add category form
    if ($isAdmin) {
        echo '<details id="main-forums">';
            echo '<summary role="button" >Add Category</summary>';
            echo '<section hx-get="/add-category" hx-trigger="load"></section>';
        echo '</details>';
    }
?>