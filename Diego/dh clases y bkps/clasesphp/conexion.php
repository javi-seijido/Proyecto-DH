<?php
      $dsn = 'mysql:host=10.20.42.128;dbname=movies_db;
      charset=utf8mb4;port:3306';
      $db_user = 'root';
      $db_pass = '1111';

      try {
        $opciones = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );
       $db = new PDO($dsn, $db_user, $db_pass, $opciones);
      }
      catch( PDOException $Exception ) {
       echo $Exception->getMessage();
      }




 ?>
