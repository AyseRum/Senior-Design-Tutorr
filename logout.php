<?php   
session_start();  
unset($_SESSION['currentuser']);  
session_destroy();  
header("location:login.html");  
exit;
?> 