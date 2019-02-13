<?php

use Tino\App;

session_start();
$_SESSION = array();
session_destroy();
session_start();

#grab user data form form fields
$username1 = $_POST['username'];
$username2 = trim($username1, " <>");
$username = str_replace(" ", "-", $username2);
$_SESSION['user'] = $username;
$password = $_POST['password'];
$fullname1 = $_POST['fullname'];
$fullname = trim($fullname1, " <>");
$email = $_POST['email'];
$phone = $_POST['phone'];

#check if user exists
App::get('database')->userexist($username);
App::get('database')->emailexist($email);
App::get('database')->numexist($phone);

//validate inputs accordging to specifie rules
if (strlen($username) < 3){
    $error = "<div class='error'>Username must not be less than 3 characters</div>";
$_SESSION['error'] = $error;
header("Location: register");
} elseif (strlen($password) < 4) {
    $error = "<div class='error'>Password must not be less than 3 characters</div>";
    $_SESSION['error'] = $error;
    header("Location: register");
} elseif (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "<div class='error'>Email is invalid, please provide a valid email address.</div>";
    $_SESSION['error'] = $error;
    header("Location: register");
} elseif (filter_var($phone, FILTER_VALIDATE_INT)) {
    $error = "<div class='error'>Phone number is invalid, please provide a valid number.</div>";
    $_SESSION['error'] = $error;
    header("Location: register");
} else {
    
    #insert into database
App::get('database')->insert('users', [
    'username' => $username,
    'password' => $password,
    'fullname' => $fullname,
    'email' => $email,
    'phone' => $phone,
]);
$success = "<div class='success'>You have been logged in successfully.</div>";
$_SESSION['success'] = $success;
header("Location: profile");
#echo $_SESSION['success'];
}