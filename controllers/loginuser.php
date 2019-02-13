<?php

use Tino\App;

$username = $_POST['username'];
$password = $_POST['password'];

App::get('database')->loginuser($username, $password);