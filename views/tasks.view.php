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
                    <span><?php echo "<a href='/profile'>$username</a>"; ?> | </span>
                    <span> <a href="logout">logout</a></span>
                </div>
            </div>
        </nav>
        <h2 class="title">List of Tasks</h2>
            <div class="userdetails">
            <ul>
            <?php echo $_SESSION['notask']; ?>
                    <?php foreach ($tasks as $task) : ?>
                        <li>
                        <?= $task->tid; ?>
                        <?= $task->taskname; ?>
                        </li>
                        <?php endforeach; ?>
            </ul>
        </div>
    </body>
</html>