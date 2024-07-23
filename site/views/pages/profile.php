<?php
    require_once 'lib/db.php';
    require_once 'lib/globals.php';

    echo $userId;
?>



<section
    hx-get="/show-profile/<?php $userId ?>"
    hx-trigger="load"
>
</section>