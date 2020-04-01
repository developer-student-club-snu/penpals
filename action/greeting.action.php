<?php

session_start();
$a = "Hello, ";
$b = $_SESSION['username'];
$c = $a . $b;
echo $c;

?>