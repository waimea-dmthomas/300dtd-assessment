<!-- Update user data when edit submitted -->

<?php

require_once 'lib/db.php';

// Connect
$db = connectToDB();

$status = $_POST['status'];

$query = "UPDATE users SET status = '$status' WHERE id = ?";
$stmt = $db->prepare($query);
$stmt->execute([$id]);

// Redirect to topic
header("HX-Redirect: $id");