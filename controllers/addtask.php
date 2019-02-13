<?php

use Tino\App;

session_start();
$_SESSION['success'] = "Task added successfully";
//var_dump($_SESSION);

if(!isset($_SESSION['user'])){
    echo $_SESSION['err'];
    return false;
} else {
    $task = $_POST['task'];
    if ($task == '') {
        return false;
    } else {
        
        App::get('database')->inserttask('tasks', [
            'taskname' => $task,
            'createdby' => $_SESSION['user']
        ]);

}
}