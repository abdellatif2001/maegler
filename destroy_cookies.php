<?php 
setcookie('id', $_SESSION['id'], time() - 86400, "/");
header('location:login.php');
