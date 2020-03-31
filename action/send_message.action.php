<?php
$conn = \global_db\db_conn();

//Check if message has been entered
if(!isset($_POST) || !isset($_POST["message_body"]) || strlen(($_POST["message_body"]))<200)
{
    echo "NO";
    die();
}

session_start();
$message = $_POST['message_body'];
$user = $_SESSION['userId'];

//check whether in a conversation
$sql1 = 'SELECT * FROM  conversations where (user1 = "' . $user .'" OR user2 = "' . $user . '" ) AND status ="1"';
$res = $conn->query($sql1);
if(mysqli_num_rows($res)<1){
    die();
}

//Getting details of conversation
$res = mysqli_fetch_assoc($res);
if($_SESSION['userId']==$res['user1'])
    $partner_id = $res['user2'];
else
    $partner_id = $res['user1'];

$convo_id = $res['id'];

//Inserting into messages
$sql = 'INSERT INTO messages (conversation, sender, receiver,content) VALUES ("' . $convo_id .'", "' . $user . '", "' . $partner_id . '","'. $message .'");';
$result = $conn->query($sql);
echo "Yes";
?>