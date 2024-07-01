<?php
session_start();

session_destroy();

// setcookie('PHPSESSID','',time()-60*60*24);

unset($_SESSION);
header("Location:front.php");
?>