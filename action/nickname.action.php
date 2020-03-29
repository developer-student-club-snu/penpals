<?php

$conn= \global_db\db_conn();

if (!isset($_POST) || !isset($_POST["nick"])|| strlen($_POST["nick"]) < 1)
{
    die();
}

session_start();
$user=$_SESSION['userId'];
$nickname = $_POST["nick"];

//check whether in a conversation
$sql1 = 'SELECT * FROM  conversations where (user1 = "' . $user .'" OR user2 = "' . $user . '" ) AND status ="1"';
$res = $conn->query($sql1);
if(mysqli_num_rows($res)<1){
    die();
}

$res = mysqli_fetch_assoc($res);
$id = $res['id'];
if($_SESSION['userId']==$res['user1']){
    $sql = 'UPDATE conversations SET nick2 = "'. $nickname .'" where id = "'. $id .'"';
    $result = $conn->query($sql);
    echo "Updated1";
}
else{
    $sql2 = 'UPDATE conversations SET nick1 = "'. $nickname .'" where id = "'. $id .'"';
    $result = $conn->query($sql2);
    echo "Updated2";
}





?>