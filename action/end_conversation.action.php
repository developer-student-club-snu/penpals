<?php

$conn = \global_db\db_conn();
 
$user=$_SESSION['userId'];

if(!isset($_GET["conv"]))
die('{"status" : "No conversation id found}');

//check whether in a conversation
$sql1 = 'SELECT * FROM  conversations where (user1 = "' . $user .'" OR user2 = "' . $user . '" ) AND status ="1" AND id =' . $_GET["conv"];
$res = $conn->query($sql1);
if(mysqli_num_rows($res)<1){
    die();
}

$res = mysqli_fetch_assoc($res);
$id = $res['id'];

$sql = 'UPDATE conversations SET status = "0" where id = "'. $id .'"';
$result = $conn->query($sql);

echo "ended";
?>