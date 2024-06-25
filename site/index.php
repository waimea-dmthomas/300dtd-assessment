<?php

//-------------------------------------------------------------
// Libraries
require_once 'lib/debug.php';
require_once 'lib/router.php';


//-------------------------------------------------------------
// Site Configuration
const SITE_NAME  = 'PBS Forums';
const SITE_OWNER = 'ReverseBuilder';


//-------------------------------------------------------------
// Setup a session
session_name('PBSFORUMS');
session_start();


//-------------------------------------------------------------
// Check which type of user we are
$userName       = $_SESSION['user']['username']     ?? 'Guest';
$isLoggedIn     = $_SESSION['user']['loggedIn']     ?? false;
$isModerator    = $_SESSION['user']['moderator']    ?? false;
$isAdmin        = $_SESSION['user']['admin']        ?? false;


//-------------------------------------------------------------
// Initialise the router
$router = new Router(['debug' => true]);


//-------------------------------------------------------------
// Define routes

$router->route(GET, PAGE, '/',      'pages/forum.php');

$router->route(GET, PAGE, '/users',      'pages/users.php');
$router->route(GET, HTMX, '/list-users', 'components/list-users.php');
$router->route(POST, HTMX, '/get-icon', 'actions/get-icon.php');

$router->route(GET, PAGE, '/profile',      'pages/profile.php');

$router->route(GET, PAGE, '/login', 'pages/login.php');
$router->route(POST, HTMX, '/login-user', 'actions/login-user.php');
$router->route(POST, HTMX, '/logout-user',    'actions/logout-user.php');

$router->route(GET, PAGE, '/signup', 'pages/signup.php');
$router->route(POST, HTMX, '/signup-user', 'actions/signup-user.php');

$router->route(GET, PAGE, '/admin', 'pages/admin.php');
$router->route(GET, HTMX, '/admin-panel', 'components/admin-panel.php');


//-------------------------------------------------------------
// Generate the required view
$router->view();

?>
