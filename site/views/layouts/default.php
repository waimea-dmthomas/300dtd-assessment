<!-- Default page layout with header / footer / nav -->

<!DOCTYPE html>
<html lang="en">

    <?php require '_head.php'; ?>

    <body>
        
        <?php require '_header.php'; ?>

        <main class="content">

            <?php require $pageContent; ?>
        
        </main>

        <div class="mobile-footer">

            <?php require '_mobile-footer.php'; ?>

        </div>

        <?php require '_footer.php'; ?>   

    </body>

</html>

