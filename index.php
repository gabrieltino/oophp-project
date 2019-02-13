<?php

require 'vendor/autoload.php';

$database = require 'core/bootstrap.php';

use Tino\Router;
use Tino\Request;
$router = Router::load('routes.php');

require $router->direct(Request::uri(), Request::method());