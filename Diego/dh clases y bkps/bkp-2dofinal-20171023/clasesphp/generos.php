<?php
 require 'conexion.php';

 $query = $db->query('SELECT name from genres');

 $results = $query->fetchAll(PDO::FETCH_ASSOC);

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
     <ul>
         <?php foreach ($results as $key) { ?>
           <li> <?php echo $key['name']; ?> </li><br>
            <?php } ?>

        
     </ul>
  </body>
</html>
