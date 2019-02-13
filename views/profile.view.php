<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View profile</title>
        <link rel="stylesheet" href="/tino.css">
</head>
<body>
    <nav>
        <div class="nav">
            <span>TEST PROJECT</span>
            <div class="rightside">
                <span><?php echo $username; ?> | </span>
                <span><?php echo "<a href='/viewtasks'>View Tasks</a>"; ?> | </span>
                <span> <a href="logout">logout</a></span>
            </div>
        </div>
    </nav>
    <?php echo $_SESSION['success'];
    ?>
    <h2 class="title">User Profile</h2>
        <div class="userdetails">
            <ul>
                <?php foreach ($users as $user) : ?>
                    <li><b>UserId: </b><?= $user->uid; ?></li>
                    <li><b>Username: </b><?= $user->username; ?></li>
                    <li><b>Password: </b><?= $user->password; ?></li>
                    <li><b>Full Name: </b><?= $user->fullname; ?></li>
                    <li><b>Email Address: </b><?= $user->email; ?></li>
                    <li><b>Phone Number: </b>0<?= $user->phone; ?></li>
                <?php endforeach; ?>
            </ul>
    </div>
    <div class="task">
    <form action="/task" method="POST">
    <input type="text" name="task" placeholder="Add your task here">
    <button>Create Task</button>
    </form>
    </div>
</body>
</html>