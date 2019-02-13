<?php
session_start();

use Tino\App;
use Tino\Users;

$_SESSION['err'] = "You can't access this page if not logged in";
//die(var_dump($_SESSION));
$username = $_SESSION['user'];
if(!isset($_SESSION['user'])){
    echo $_SESSION['err'];
    return false;
}
$users = App::get('database')->callusers($username);

require 'views/profile.view.php';

//echo $_SESSION['success'];
