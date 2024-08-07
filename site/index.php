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
$userId         = $_SESSION['user']['id']           ?? '0';
$isLoggedIn     = $_SESSION['user']['loggedIn']     ?? false;
$isModerator    = $_SESSION['user']['moderator']    ?? false;
$isAdmin        = $_SESSION['user']['admin']        ?? false;


//-------------------------------------------------------------
// Initialise the router
$router = new Router(['debug' => true]);


//-------------------------------------------------------------
// Define routes

$router->route(GET, PAGE, '/',      'pages/forum.php');
$router->route(GET, HTMX, '/list-categories', 'components/list-categories.php');
$router->route(GET, HTMX, '/add-category-form', 'components/add-category-form.php');
$router->route(POST, HTMX, '/add-category', 'actions/add-category.php');

$router->route(GET, PAGE, '/category/$id',      'pages/category.php');
$router->route(GET, HTMX, '/list-topics/$id', 'components/list-topics.php');
$router->route(GET, HTMX, '/add-topic-form/$id',      'components/add-topic-form.php');
$router->route(POST, HTMX, '/add-topic/$category', 'actions/add-topic.php');

$router->route(GET, PAGE, '/topic/$id',      'pages/topic.php');

$router->route(GET, PAGE, '/users',      'pages/users.php');
$router->route(GET, HTMX, '/list-users', 'components/list-users.php');

$router->route(GET, PAGE, '/profile/$id',      'pages/profile.php');
$router->route(GET, HTMX, '/edit-profile/$id',      'components/edit-profile.php');

$router->route(GET, PAGE, '/login', 'pages/login.php');
$router->route(POST, HTMX, '/login-user', 'actions/login-user.php');
$router->route(GET, HTMX, '/login-complete',      'components/login-complete.php');
$router->route(POST, HTMX, '/logout-user',    'actions/logout-user.php');

$router->route(GET, PAGE, '/signup', 'pages/signup.php');
$router->route(POST, HTMX, '/signup-user', 'actions/signup-user.php');  

$router->route(GET, PAGE, '/admin', 'pages/admin.php');
$router->route(GET, HTMX, '/admin-panel', 'components/admin-panel.php');
$router->route(DELETE, HTMX, '/delete-user/$id', 'actions/delete-user.php');
$router->route(PUT, HTMX, '/process-admin/$id', 'actions/process-admin.php');
$router->route(PUT, HTMX, '/process-moderator/$id', 'actions/process-moderator.php');   


//-------------------------------------------------------------
// Generate the required view
$router->view();

?>
