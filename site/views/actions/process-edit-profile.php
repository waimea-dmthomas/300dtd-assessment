<!-- Update user data when edit submitted -->

<?php

require_once 'lib/db.php';

// Connect
$db = connectToDB();

$status = $_POST['status'];
$bio = $_POST['bio'];

$query = "UPDATE users SET status = '$status', bio = '$bio' WHERE id = ?";
$stmt = $db->prepare($query);
$stmt->execute([$id]);

// Redirect to topic
header("HX-Redirect: $id");