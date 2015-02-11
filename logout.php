<?php 
$cookie_name='pavlos6';
unset($_COOKIE[$cookie_name]);setcookie($cookie_name, "", time() - 3600, "/"); 
header('Location: Home.php');
?>

   