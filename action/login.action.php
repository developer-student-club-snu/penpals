<?php
$conn = \global_db\db_conn();

if(!isset($_POST) || !isset($_POST["username"])|| !isset($_POST["password"]) || (strlen($_POST["username"]) < 4) || (strlen($_POST["password"]) < 8))
{
    echo "Username and Password must be longer than 8 characters!";
    die();
}

session_start();

$username = md5($_POST["username"]);

$sql1 = 'SELECT * FROM users where username="' . $username . '"';

$res = $conn->query($sql1);

if(mysqli_num_rows($res) < 1)
{
    echo "Username does not exist!";
    die();
}


$res = mysqli_fetch_assoc($res);

$salt = $res['salt'];

$password = $res['password'];

$pass = hash("sha256", $salt . $_POST["password"]);
if ($pass != $password)
{
    echo "Password is Incorrect!";
    die();
}

$_SESSION["status"] = true;
$_SESSION["userId"] = $res['id'];


echo "Logged in";
die();
?>
