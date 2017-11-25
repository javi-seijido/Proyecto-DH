<?php

if ($_POST) {
   if (isset($_POST["cr_db"])) {
    //  echo "<pre>";
    //  var_dump($_POST);
    //  echo "</pre>";
    //  exit;
      $dsn = 'mysql:host=192.168.0.12;';
      $db_user = 'root';
      $db_pass = '1111';
      $opciones = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );
     try {
         	$db = new PDO($dsn, $db_user, $db_pass, $opciones);
     }catch( PDOException $e ){
            $db->rollBack();
            echo 'El error fue->'.$e->getMessage();
     }

     $db->beginTransaction();

     try{
       $db->query('CREATE SCHEMA gib;');
       $db->query('USE gib;');
       $db->commit();


     }catch( PDOException $e ){
       $db->rollBack();
       echo 'El error fue->'.$e->getMessage();
     }

   } else {
        if (isset($_POST["cr_tb"])) {
          $dsn = 'mysql:host=192.168.0.12;dbname=gib;';
          $db_user = 'root';
          $db_pass = '1111';
          $opciones = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );

          try {
                $db = new PDO($dsn, $db_user, $db_pass, $opciones);
          }catch( PDOException $e ){
                 $db->rollBack();
                 echo 'El error fue->'.$e->getMessage();
          }

          $db->beginTransaction();

          try{
            // echo "<pre>";
            // var_dump($db);
            // echo "</pre>";
            // exit.
            $db->query('CREATE TABLE perfil (
                        id int(11) NOT NULL AUTO_INCREMENT,
                        name varchar(45) NOT NULL,
                        PRIMARY KEY (id),
                        UNIQUE KEY id_UNIQUE (id)
                      ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;');

            $db->commit();

          }catch( PDOException $e ){
            $db->rollBack();
            echo 'El error fue->'.$e->getMessage();
          }

          $db->beginTransaction();

          try {

            $db->query('CREATE TABLE user (
              id int(11) NOT NULL AUTO_INCREMENT,
              username varchar(45) NOT NULL,
              email varchar(100) NOT NULL,
              password varchar(255) NOT NULL,
              act tinyint(4) NOT NULL DEFAULT 0,
              perfil_id int(11) NOT NULL,
              PRIMARY KEY (id),
              UNIQUE KEY id_UNIQUE (id),
              UNIQUE KEY username_UNIQUE (username),
              UNIQUE KEY email_UNIQUE (email),
              UNIQUE KEY password_UNIQUE (password),
              KEY fk_user_perfil1_idx (perfil_id),
              CONSTRAINT fk_user_perfil1 FOREIGN KEY (perfil_id) REFERENCES perfil (id) ON DELETE NO ACTION ON UPDATE NO ACTION
            ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;');

              $db->commit();


          }catch( PDOException $e ){
            $db->rollBack();
            echo 'El error fue->'.$e->getMessage();
          }

          $db->beginTransaction();

          try {

            $db->query('CREATE TABLE location (
              id int(11) NOT NULL AUTO_INCREMENT,
              name varchar(45) NOT NULL,
              PRIMARY KEY (id),
              UNIQUE KEY name_UNIQUE (name)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;');

              $db->commit();


          }catch( PDOException $e ){
            $db->rollBack();
            echo 'El error fue->'.$e->getMessage();
          }

          $db->beginTransaction();

          try {

            $db->query('CREATE TABLE street (
              id int(11) NOT NULL AUTO_INCREMENT,
              name varchar(80) NOT NULL,
              num_from int(11) NOT NULL DEFAULT 0,
              num_to int(11) NOT NULL,
              state varchar(45) NOT NULL,
              location_id int(11) NOT NULL,
              PRIMARY KEY (id),
              KEY fk_street_location1_idx (location_id),
      CONSTRAINT fk_street_location1 FOREIGN KEY (location_id) REFERENCES location (id) ON DELETE NO ACTION ON UPDATE NO ACTION
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1;');

              $db->commit();


          }catch( PDOException $e ){
            $db->rollBack();
            echo 'El error fue->'.$e->getMessage();
          }


          $db->beginTransaction();

          try {

              $db->query('CREATE TABLE ranks (
                id int(11) NOT NULL AUTO_INCREMENT,
                name varchar(45) NOT NULL,
                PRIMARY KEY (id),
                UNIQUE KEY name_UNIQUE (name)
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1;');

              $db->commit();

          }catch( PDOException $e ){
            $db->rollBack();
            echo 'El error fue->'.$e->getMessage();
          }

          $db->beginTransaction();

          try {

              $db->query('CREATE TABLE personal (
                          id int(11) NOT NULL AUTO_INCREMENT,
                          name varchar(45) NOT NULL,
                          lastname varchar(45) NOT NULL,
                          age tinyint(2) NOT NULL,
                          gender varchar(45) NOT NULL,
                          date_age date NOT NULL,
                          dni varchar(8) NOT NULL,
                          movil_phone varchar(10) NOT NULL,
                          email varchar(100) NOT NULL,
                          number_street int(11) NOT NULL DEFAULT 0,
                          date_start date NOT NULL,
                          date_end date NOT NULL,
                          info varchar(255) DEFAULT NULL,
                          rank_id int(11) NOT NULL,
                          street_id int(11) NOT NULL,
                          location_id int(11) NOT NULL,
                          PRIMARY KEY (id),
                          UNIQUE KEY dni_UNIQUE (dni),
                          UNIQUE KEY email_UNIQUE (email),
                          KEY fk_personal_rank_idx (rank_id),
                          KEY fk_personal_street1_idx (street_id),
                          KEY fk_personal_location1_idx (location_id),
                          CONSTRAINT fk_personal_rank FOREIGN KEY (rank_id) REFERENCES ranks (id) ON DELETE NO ACTION ON UPDATE NO ACTION,
                          CONSTRAINT fk_personal_street1 FOREIGN KEY (street_id) REFERENCES street (id) ON DELETE NO ACTION ON UPDATE NO ACTION,
                          CONSTRAINT fk_personal_location1 FOREIGN KEY (location_id) REFERENCES location (id) ON DELETE NO ACTION ON UPDATE NO ACTION
                        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;');

            $db->commit();

          }catch( PDOException $e ){
            $db->rollBack();
            echo 'El error fue->'.$e->getMessage();
          }


     } else {
      require_once("../clases/dbJSON.php");
      $dbJSON = new dbJSON();
      $usuarios = $dbJSON->traerTodos();

       $dsn = 'mysql:host=192.168.0.12;dbname=gib;';
       $db_user = 'root';
       $db_pass = '1111';
       $opciones = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION );

       try {
             $db = new PDO($dsn, $db_user, $db_pass, $opciones);
       }catch( PDOException $e ){
              $db->rollBack();
              echo 'El error fue->'.$e->getMessage();
       }

       try {

         $query=$db->prepare('INSERT INTO perfil (name) VALUES ("Administrador");');
         $query->execute();

         $query=$db->prepare('INSERT INTO ranks (name) VALUES ("BOMBEROS");');
         $query->execute();
         $query=$db->prepare('INSERT INTO ranks (name) VALUES ("JEFE DE CUERPO");');
         $query->execute();
         $query=$db->prepare('INSERT INTO ranks (name) VALUES ("OFICIALES");');
         $query->execute();
         $query=$db->prepare('INSERT INTO ranks (name) VALUES ("SUB JEFE DE CUERPO");');
         $query->execute();
         $query=$db->prepare('INSERT INTO ranks (name) VALUES ("SUB OFICIALES");');
         $query->execute();

         $query=$db->prepare('INSERT INTO location (name) VALUES ("AVELLANEDA");');
         $query->execute();
         $query=$db->prepare('INSERT INTO location (name) VALUES ("SARANDI");');
         $query->execute();
         $query=$db->prepare('INSERT INTO location (name) VALUES ("VILLA DOMINICO");');
         $query->execute();
         $query=$db->prepare('INSERT INTO location (name) VALUES ("WILDE");');
         $query->execute();

         $query=$db->prepare('INSERT INTO street (name,num_from,num_to,state,location_id) VALUES ("AV MITRE","0","3000","BUENOS AIRES","1");');
         $query->execute();

         $stmt=$db->prepare("
          INSERT INTO user (username,email,password,act,perfil_id)
          VALUES (:username,:email,:password,:act,:perfil_id);
        ");

         $stmt->bindValue(":username",$usuarios[0]['codigo'],PDO::PARAM_STR);
         $stmt->bindValue(":email",$usuarios[0]['email'],PDO::PARAM_STR);
         $stmt->bindValue(":password",$usuarios[0]['password'],PDO::PARAM_STR);
         $stmt->bindValue(":act",$usuarios[0]['act'],PDO::PARAM_INT);
         $stmt->bindValue(":perfil_id",$usuarios[0]['nivel'],PDO::PARAM_INT);
         $stmt->execute();

          header('Location: index.php'); exit;

       }catch( PDOException $e ){
              echo 'El error fue->'.$e->getMessage();
       }
     }
   }

}

 ?>

 <!DOCTYPE html>
 <html>
 	<head>
 		<meta charset="utf-8">
 		<title>Sistema de Bomberos</title>
 		<meta name="viewport" content="width=device-width. initial-scale=1.0">
 		<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
 		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 		<link rel="stylesheet" href="../css/normalize.css">
 		<link rel="stylesheet" href="../css/styles_log.css">
 	</head>
 	<body>
        <form class= "loguin_border" action="" method="post">
            <h3>Creacion de Base de Datos.</h3>
          <button class="input" type="submit" name="cr_db"> Crear DB</button>
          <button class="input" type="submit" name="cr_tb"> Crear Tablas</button>
          <button class="input" type="submit" name="mg"> Migrar Datos</button>

        </form>
 	</body>
 </html>
