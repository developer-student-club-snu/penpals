<?php

$conn = \global_db\db_conn();
 
$user = $_SESSION['userId'];

//check if already in a conversation
$sql = 'SELECT * FROM  conversations where (user1 = "' . $user .'" OR user2 = "' . $user . '" ) AND status ="1"';
$res = $conn->query($sql);
if(mysqli_num_rows($res)<1){
    die();
}

$res = mysqli_fetch_assoc($res);

if($_SESSION['userId']==$res['user1'])
{   $partner = $res['user1'];
    if($res['nick2']!=""){
        echo $res['nick2'];
    }
    else{
        echo "Friend";
    }
}
else
{   $partner = $res['user2'];
    if($res['nick1']!=""){
        echo $res['nick1'];
    }
    else{
        echo "Friend";
    }
}


?>