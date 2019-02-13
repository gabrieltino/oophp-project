<?php

$router->get('', 'controllers/index.php');
$router->get('login', 'controllers/login.php');
$router->get('register', 'controllers/register.php');
$router->get('profile', 'controllers/profile.php');
$router->get('logout', 'controllers/logout.php');
$router->get('viewtasks', 'controllers/viewtasks.php');

$router->post('login', 'controllers/loginuser.php');
$router->post('register', 'controllers/adduser.php');
$router->post('task', 'controllers/addtask.php');
