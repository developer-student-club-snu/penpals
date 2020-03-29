<?php

$conn= \global_db\db_conn();

//check whether in a conversation
$sql1 = 'SELECT * FROM  conversations where (user1 = "' . $user .'" OR user2 = "' . $user . '" ) AND status ="1"';
$res = $conn->query($sql1);
if(mysqli_num_rows($res)<1){
    die();
}

$res = mysqli_fetch_assoc($res);
if($_SESSION['userId']==$res['user1'])
    $partner_id = $res['user2'];
else
    $partner_id = $res['user1'];

$convo_id = $res['id'];

?>