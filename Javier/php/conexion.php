<?php
      $dsn = 'mysql:host=lcalhost;dbname=gib;
      charset=utf8mb4;port:3306';
      $db_user = 'root';
      $db_pass = '';

      try {
        $opciones = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );
       $db = new PDO($dsn, $db_user, $db_pass, $opciones);
      }
      catch( PDOException $Exception ) {
       echo $Exception->getMessage();
       header('Location: create_db.php'); exit;
      }

 ?>
