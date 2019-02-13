<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login page</title>
        <link rel="stylesheet" href="/tino.css">
</head>
<body>
    <div class="login-reg">
        <form id="form" method="POST" action="/login">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="password">
            <button class="login">Login</button>
        </form>
    </div>
</body>
</html>