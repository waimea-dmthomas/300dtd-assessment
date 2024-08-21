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

$router->route(GET,     PAGE,   '/',                        'pages/forum.php');
$router->route(GET,     HTMX,   '/forum',                   'components/list-categories.php');
$router->route(GET,     HTMX,   '/add-category',            'components/add-category-form.php');
$router->route(POST,    HTMX,   '/add-category',            'actions/add-category.php');

$router->route(GET,     PAGE,   '/category/$id',            'pages/category.php');
$router->route(GET,     HTMX,   '/category/$id',            'components/list-topics.php');
$router->route(GET,     HTMX,   '/add-topic/$id',           'components/add-topic-form.php');
$router->route(POST,    HTMX,   '/add-topic/$category',     'actions/add-topic.php');
$router->route(PUT,     HTMX,   '/lock-topic/$id',          'actions/process-lock-topic.php');
$router->route(PUT,     HTMX,   '/pin-topic/$id',           'actions/process-pin-topic.php');
$router->route(DELETE,  HTMX,   '/delete-topic/$id',        'actions/delete-topic.php');

$router->route(GET,     PAGE,   '/topic/$id',               'pages/topic.php');
$router->route(GET,     HTMX,   '/comments/$id',            'components/list-comments.php');
$router->route(GET,     HTMX,   '/add-comment/$id',         'components/add-comment-form.php');
$router->route(POST,    HTMX,   '/add-comment/$topic',      'actions/add-comment.php');
$router->route(DELETE,  HTMX,   '/delete-comment/$id',      'actions/delete-comment.php');

$router->route(GET,     PAGE,   '/users',                   'pages/users.php');
$router->route(GET,     HTMX,   '/users',                   'components/list-users.php');

$router->route(GET,     PAGE,   '/profile/$id',             'pages/profile.php');
$router->route(GET,     HTMX,   '/edit-profile/$id',        'components/edit-profile.php');
$router->route(POST,     HTMX,   '/process-edit-profile/$id','actions/process-edit-profile.php');

$router->route(GET,     PAGE,   '/login',                   'pages/login.php');
$router->route(POST,    HTMX,   '/login',                   'actions/login-user.php');
$router->route(GET,     HTMX,   '/login-complete',          'components/login-complete.php');
$router->route(POST,    HTMX,   '/logout',                  'actions/logout-user.php');

$router->route(GET,     PAGE,   '/signup',                  'pages/signup.php');
$router->route(POST,    HTMX,   '/signup',                  'actions/signup-user.php');  

$router->route(GET,     PAGE,   '/admin',                   'pages/admin.php');
$router->route(GET,     HTMX,   '/admin',                   'components/admin-panel.php');
$router->route(DELETE,  HTMX,   '/process-ban-user/$id',    'actions/process-ban-user.php');
$router->route(PUT,     HTMX,   '/process-admin/$id',       'actions/process-admin.php');
$router->route(PUT,     HTMX,   '/process-moderator/$id',   'actions/process-moderator.php');   


//-------------------------------------------------------------
// Generate the required view
$router->view();

?>
