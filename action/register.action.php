<?php

$conn = \global_db\db_conn();

if(!isset($_POST) || !isset($_POST["username"])|| !isset($_POST["password"]) || (strlen($_POST["username"]) < 4) || (strlen($_POST["password"]) < 8))
die(
    '
    {
        "status" : "Username and Password need to be longer than 8 characters."
    }
    '
);

session_start();

$username = md5($_POST["username"]);
$salt = md5(time() . (rand() * 1000));
$pass = hash("sha256", $salt . $_POST["password"]);

$sql1 = 'SELECT * FROM users where username="' . $username . '";';
//SELECT * FROM users WHERE username="username";

$res = $conn->query($sql1);

if(mysqli_num_rows($res) >= 1)
die(
    '
    {
        "status" : "Username already exists."
    }
    '
);

$sql = 'INSERT INTO users (username, salt, password) VALUES ("' . $username .'", "' . $salt . '", "' . $pass . '");';

$conn->query($sql);

$_SESSION["status"] = true;

die(
    '
    {
        "status" : "Logged in"
    }
    '
);

require_once "index.php";