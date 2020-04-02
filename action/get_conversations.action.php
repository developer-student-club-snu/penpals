<?php

$conn = \global_db\db_conn();
 
$user=$_SESSION['userId'];

//check whether in a conversation
$sql1 = 'SELECT * FROM  conversations where (user1 = "' . $user .'" OR user2 = "' . $user . '" ) AND status ="1"';
$res = $conn->query($sql1);
if(mysqli_num_rows($res)<1){
    die("[]");
}

$ret = array();

while($temp = mysqli_fetch_assoc($res))
{
    $row = array(
        "convId" => $temp["id"],
        "nickname" => $temp["user1"] == $_SESSION["userId"] ? $temp["nick2"] : $temp["nick1"]
    );
    array_push($ret, $row);
}

die(json_encode($ret));
?>