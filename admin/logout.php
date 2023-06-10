<?php 
session_start();

$_SESSION = [];    #menghilangkan session
session_unset();   #menghilangkan session
session_destroy(); #menghilangkan session


setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);

header("location: login.php");
exit;
 ?>