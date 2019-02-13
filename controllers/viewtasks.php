<?php
session_start();
use Tino\App;

if(!isset($_SESSION['user'])){
    echo $_SESSION['err'];
    return false;
}
$username = $_SESSION['user'];
$createdby = $_SESSION['user'];

$tasks = App::get('database')->calltasks($createdby);

require 'views/tasks.view.php';