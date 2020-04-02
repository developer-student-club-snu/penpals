<?php

 

$conn = \global_db\db_conn();
$user = $_SESSION['userId'];

//check if already in a conversation
$sql5 = 'SELECT * FROM  conversations where (user1 = "' . $user .'" OR user2 = "' . $user . '" ) ';
$conv = $conn->query($sql5);
if(mysqli_num_rows($conv)>=4){
    echo "You are already in maximum conversations !";
    die();
}

//Insert into conversation table, if partner is available
$sql = 'SELECT * FROM  waitinglist where status="1" AND user<>"' . $user . '";';
$test = $conn->query($sql);
if(mysqli_num_rows($test) >= 1){

    while($temp = mysqli_fetch_assoc($test))
    {
        $partner = $temp['user'];
        $sql3 = 'SELECT * FROM  conversations where (user1 = "' . $user .'" OR user2 = "' . $user . '" ) AND (user1 = "' . $partner .'" OR user2 = "' . $partner . '" );';
        $check = $conn->query($sql3);
        if(mysqli_num_rows($check) >= 1)
        continue;

        $sql3 = 'INSERT INTO conversations (user1, user2, status) VALUES ("' . $user .'","' . $partner .'","1");';
        $convo = $conn->query($sql3);

        $sql4 = 'UPDATE waitinglist SET status = "0" where user = "'. $partner .'"';
        $change = $conn->query($sql4);

        echo "You have been paired !";
        die();
    }
}

//check if already waitlisted
$sql1 = 'SELECT * FROM  waitinglist where status ="1" AND user="' . $user . '";';
$test = $conn->query($sql1);
if(mysqli_num_rows($test) >= 1)
{
    echo "Waitlisted! You will be econnected when a new person is available!";
    die();
}

//Insert in the waitlist table
$sql2 = 'INSERT INTO waitinglist (user, status) VALUES ("' . $user .'","1");';
$res = $conn->query($sql2);
echo "Waitlisted! You will be econnected when a new person is available!";
exit();

?>