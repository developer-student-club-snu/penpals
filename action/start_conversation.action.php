<?php

session_start();

$conn = \global_db\db_conn();
$user = $_SESSION['userId'];

//Check if a partner is available
$sql = 'SELECT * FROM  waitinglist where status ="1" AND user<>"' . $user . '";';
$test = $conn->query($sql);
if(mysqli_num_rows($test) >= 1){
    
}

//check if already waitlisted
$sql1 = 'SELECT * FROM  waitinglist where status ="1" AND user="' . $user . '";';
$test = $conn->query($sql1);
if(mysqli_num_rows($test) >= 1)
{
    echo "Waitlisted!";
    die();
}

//Insert in the waitlist table
$sql2 = 'INSERT INTO waitinglist (user, status) VALUES ("' . $user .'","1");';
$res = $conn->query($sql2);
echo "Waitlisted!";
exit();

?>