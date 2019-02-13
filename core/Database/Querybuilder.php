<?php

namespace Tino\Database;
use Tino\Users;

class Querybuilder
{

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function callusers($username)
    {
        $sql = "select *  from users where username='$username'";
        
$statement = $this->pdo->prepare($sql);

$statement->execute();

return $statement->fetchAll(\PDO::FETCH_CLASS, 'Tino\Users');
    }


    public function calltasks($createdby)
    {
        $sql = "select * from tasks where createdby = '$createdby'";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        if($statement->rowCount() < 1){
            $_SESSION['notask'] = "You have not added any task yet. Please add them in your profile page";
        }
        return $statement->fetchAll(\PDO::FETCH_CLASS, 'Tino\Task');
    }

public function userexist($user)
{
$sql1 = "select username from users where username='$user'";
$statement = $this->pdo->prepare($sql1);
$statement->execute();
        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        if ($statement->rowCount() > 0) {
            die("User already exists");
        }
}

public function numexist($num)
{
$sql3 = "select phone from users where phone='$num'";
$statement = $this->pdo->prepare($sql3);
$statement->execute();
        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        if ($statement->rowCount() > 0) {
            die("Phone number already in use");
        }
}

    public function emailexist($email)
    {
        $sql2 = "select email from users where email='$email'";
        $statement = $this->pdo->prepare($sql2);
        $statement->execute();
        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        if ($statement->rowCount() > 0) {
            die("Email already exists");
        }
    }

    public function insert($table, $params)
    {
        $sql = sprintf(
            "insert into %s (%s) 
        values (%s)", 
        $table, 
        implode(', ', array_keys($params)), 
        ':' . implode(', :', array_keys($params))
    );
//die(var_dump($sql));
$statement = $this->pdo->prepare($sql);
$statement->execute($params);
    }


public function inserttask($table, $params)
{
    $sql = sprintf(
        "insert into %s (%s) 
    values (%s)", 
    $table, 
    implode(', ', array_keys($params)), 
    ':' . implode(', :', array_keys($params))
);

//die(var_dump($sql));
$statement = $this->pdo->prepare($sql);
if ($statement->execute($params)){
    $_SESSION['success'] = "<div class='success'>task created successfully</div>";
    header("Location: profile");
}
}


    public function loginuser($username, $password)
    {
        $sqlq = "select * from users where username='$username'";
        //die(var_dump($sqlq));
        $query = $this->pdo->prepare($sqlq);
        //$query->bindParam(":username", $username);
        $query->execute();
        $row = $query->fetch(\PDO::FETCH_ASSOC);
        if ($query->rowCount() > 0) {
                // Verify hashed password against entered password
            if ($password == $row['password']) {
                //$row['password'] = $password;
                session_start();
                    // Define session on successful login
                $_SESSION['user'] = $username;
                $_SESSION['success'] = "<div class='success'>Logged in successfully</div>";
                //echo $_SESSION['success'];
                header("Location: profile");
            } else {
                echo "Incorrect Password <a href='login'>RETRY</a>";
            }
    } else {
        $error = "<div class='error2'>User does not exist, please kindly register <a href='register'>REGISTER</a></div>";
        $_SESSION['error'] = $error;
      echo $_SESSION['error'];
      require 'views/login.view.php';
    }
}
}