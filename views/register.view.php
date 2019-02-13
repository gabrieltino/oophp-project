<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration page</title>
        <link rel="stylesheet" href="/tino.css">
</head>
<body>
    <div class="regform">
        <?php echo $_GET['errlog']; ?>
        <form method="POST" action="/register">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="password" required>
            <input type="text" name="fullname" placeholder="Full name" required>
            <input type="email" name="email" placeholder="Email address" required>
            <input type="tel" name="phone" placeholder="Phone" required>
            <button type="submit" class="login">Register</button>
        </form>
    </div>
</body>
</html>