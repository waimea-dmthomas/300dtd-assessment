<!-- Get the icon image data from the user database -->

<h1>Icon</h1>

<?php

require_once 'lib/db.php';

// ID of icon should be in URL
$id = $_GET['id'] ?? null;

$db = connectToDB();

// Get the image type and binary data
$query = 'SELECT iconType, iconFile FROM users WHERE id=?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $icon = $stmt->fetch();

    // Failed to get an image back?
    if (!$icon) throw new Exception();
}
catch (Exception $e) {
    // Failed, so 404
    http_response_code(404);
    die();
}

// Got here, so all went well. Pass back the image data as a response
header('Content-type: ' . $icon['iconType']);
echo $icon['iconFile'];

?>