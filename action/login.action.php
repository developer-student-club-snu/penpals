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

$sql1 = 'SELECT * FROM users where username="' . $username . '"';

$res = $conn->query($sql1);

if(mysqli_num_rows($res) < 1)
die(
    '
    {
        "status" : "Username does not exist."
    }
    '
);

$res = mysqli_fetch_assoc($res);

$salt = $res['salt'];

$password = $res['password'];

$pass = hash("sha256", $salt . $_POST["password"]);
if ($pass != $password)
die(
    '
    {
        "status" : "Password does not match."
    }
    '
);

$_SESSION["status"] = true;
$_SESSION["loggedIn"] = $res['id'];

die(
    '
    {
        "status" : "Logged in",
    }
    '
);
