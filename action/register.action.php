<?php

$conn = \global_db\db_conn();

//Checking Length of username and password
if(!isset($_POST) || !isset($_POST["username"])|| !isset($_POST["password"]) || (strlen($_POST["username"]) < 4) || (strlen($_POST["password"]) < 8))
{
    echo "{ \"status\" : \"Username and Password must be longer than 8 characters!\"}";
    die();
}

$username = md5($_POST["username"]);
$salt = md5(time() . (rand() * 1000));
$pass = hash("sha256", $salt . $_POST["password"]);

//Check if username already exists
$sql1 = 'SELECT * FROM users where username="' . $username . '";';
$res = $conn->query($sql1);

if(mysqli_num_rows($res) >= 1)
{
    echo "{ \"status\" : \"Username already exists!\"}";
    die();
}


//Creating a new user
$sql = 'INSERT INTO users (username, salt, password) VALUES ("' . $username .'", "' . $salt . '", "' . $pass . '");';
$conn->query($sql);

$sql1 = 'SELECT * FROM users where username="' . $username . '";';
$res = $conn->query($sql1);
$res = mysqli_fetch_assoc($res);
$user = $res["id"];

$_SESSION['userId'] = $user;
$_SESSION['username'] = $_POST['username']; 
$_SESSION["status"] = true;
die("{
    \"status\": true
}");
