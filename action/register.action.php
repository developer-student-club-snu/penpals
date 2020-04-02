<?php

$conn = \global_db\db_conn();

//Checking Length of username and password
if(!isset($_POST) || !isset($_POST["username"])|| !isset($_POST["password"]) || (strlen($_POST["username"]) < 4) || (strlen($_POST["password"]) < 8))
{
    echo "Username and Password must be longer than 8 characters!";
    die();
}

$_SESSION['username'] = $_POST['username']; 

$username = md5($_POST["username"]);
$salt = md5(time() . (rand() * 1000));
$pass = hash("sha256", $salt . $_POST["password"]);

//Check if username already exists
$sql1 = 'SELECT * FROM users where username="' . $username . '";';
$res = $conn->query($sql1);

if(mysqli_num_rows($res) >= 1)
{
    echo "Username already exists!";
    die();
}

//Creating a new user
$sql = 'INSERT INTO users (username, salt, password) VALUES ("' . $username .'", "' . $salt . '", "' . $pass . '");';
$conn->query($sql);

$sql2 = 'SELECT * FROM  conversations where (user1 = "' . $user .'" OR user2 = "' . $user . '" ) AND status ="1"';
$res2 = $conn->query($sql2);
$res3 =mysqli_fetch_assoc($res2);
$_SESSION['userId'] = $res4['id'];

$_SESSION["status"] = true;

    header("location : /index.php");
    die();
