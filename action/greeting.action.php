<?php

session_start();
$a = "Welcome, ";
$b = $_SESSION['username'];
$c = $a . $b;
echo $c;

?>