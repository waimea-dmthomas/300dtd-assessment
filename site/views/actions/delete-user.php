<?php

require_once '_session.php';
require_once '_functions.php';

$userID = $_GET['id'] ?? false;

echo '<h1>Delete User</h1>';

if (!$userID) die ("No user ID supplied");

echo '<p>';

$db = connectToDB();

$query = 'DELETE FROM users WHERE id = ?';
$stmt = $db->prepare($query);
$stmt->execute([$userID]);

header('location: list-users.php');