<?php

session_start();

//Checking if waitlisted

$conn = \global_db\db_conn();

$user = $_SESSION['userId'];

$sql1 = 'SELECT * FROM  waitinglist where status ="1" AND user="' . $user . '";';

$test = $conn->query($sql1);

if(mysqli_num_rows($test) >= 1)
{
    echo "Waitlisted!";
    die();
}

exit();

?>