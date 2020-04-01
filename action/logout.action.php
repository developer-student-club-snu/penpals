<?php 
 
 unset($_SESSION["userId"]);
 unset($_SESSION["username"]);
 session_unset();
 session_destroy();  
 header("Location: /index.php");
 
?>