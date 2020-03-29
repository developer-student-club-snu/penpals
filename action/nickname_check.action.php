<?php

$conn = \global_db\db_conn();
$user = $_SESSION['userId'];

//check if already in a conversation
$sql = 'SELECT * FROM  conversations where (user1 = "' . $user .'" OR user2 = "' . $user . '" ) AND status ="1"';
$res = $conn->query($sql);
if(mysqli_num_rows($res)<1){
    die();
}

$res = mysqli_fetch_assoc[$res];



?>