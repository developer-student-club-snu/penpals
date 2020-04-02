<?php
$conn = \global_db\db_conn();

//Checking for Length of Username and Password
if(!isset($_POST) || !isset($_POST["username"])|| !isset($_POST["password"]) )
{
    echo "{\"status\" : \"Please Enter Username and Password\"}";
    die();
}

if( (strlen($_POST["username"]) == 0 ) || (strlen($_POST["password"]) == 0) )
{
    echo "{\"status\" : \"Please Enter Username and Password\"}";
    die();
}
$username = md5($_POST["username"]);

//Check if username exists
$sql1 = 'SELECT * FROM users where username="' . $username . '"';
$res = $conn->query($sql1);

if(mysqli_num_rows($res) < 1)
{
    echo "{\"status\" : \"Username does not exist!\"}";
    die();
}

$res = mysqli_fetch_assoc($res);
$salt = $res['salt'];
$password = $res['password'];
$pass = hash("sha256", $salt . $_POST["password"]);

//Checking Password
if ($pass != $password)
{
    echo "{\"status\" : \"Password is Incorrect!\"}";
    die();
}

$_SESSION["status"] = 'true';
$_SESSION["userId"] = $res['id'];
$_SESSION['username'] = $_POST['username'];


echo "{\"status\" : true}";

die();
?>
