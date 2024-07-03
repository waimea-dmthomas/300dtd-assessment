<?php
    require_once 'lib/db.php';
    require_once 'lib/globals.php';
?>

<section  
    hx-get="/show-profile/<?php $user['id'] ?>"
    hx-trigger="load"
>
</section>