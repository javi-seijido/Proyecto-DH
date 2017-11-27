<?php
session_start();
session_destroy();
// unset($_COOKIE['id']);
// unset($_COOKIE['name']);
setcookie('id',$usuario['id'], time()-3600, "/");
setcookie('name',$usuario['name'], time()-3600, "/");

header('Location: index.php'); exit;

 ?>
