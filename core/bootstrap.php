<?php

use Tino\App;
use Tino\Database\Connection;
use Tino\Database\Querybuilder;

App::bind('config', require 'config.php');

App::bind('database', new Querybuilder(

    Connection::make(App::get('config')['database'])
    
));