<?php

//-------------------------------------------------------------
// Libraries
require_once 'lib/debug.php';
require_once 'lib/router.php';


//-------------------------------------------------------------
// Site Configuration
const SITE_NAME  = 'PBS Forums';
const SITE_OWNER = 'Waimea College';


//-------------------------------------------------------------
// Setup a session
session_name('PBSFORUMS');
session_start();


//-------------------------------------------------------------
// Check which type of user we are
$userName   = $_SESSION['user']['username']     ?? 'Guest';
$isLoggedIn = $_SESSION['user']['loggedIn']     ?? false;
$isAdmin    = $_SESSION['user']['admin']        ?? false;


//-------------------------------------------------------------
// Initialise the router
$router = new Router(['debug' => true]);


//-------------------------------------------------------------
// Define routes

$router->route(GET, PAGE, '/',      'pages/home.php');
$router->route(GET, PAGE, '/about', 'pages/about.php');


//-------------------------------------------------------------
// Generate the required view
$router->view();

?>
