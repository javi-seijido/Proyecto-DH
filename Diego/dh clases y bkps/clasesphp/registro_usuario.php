 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>reg de usuariio</title>
   </head>
   <body>
     <?php var_dump($_POST)?>
     <form class="" action="registro_usuario.php" method="post">
        <input type="text" name="name" value="<?php echo (isset($_POST["name"])) ? $_POST["name"] : ""; ?>" placeholder="nombre">
        <input type="text" name="apellido" value="<?php echo (isset($_POST["apellido"])) ? $_POST["apellido"] : ""; ?>" placeholder="apellido">
        <input type="text" name="anios" value="<?php echo (isset($_POST["anios"])) ? $_POST["anios"] : ""; ?>" placeholder="años">
        <input type="text" name="mail" value="<?php echo (isset($_POST["mail"])) ? $_POST["mail"] : ""; ?>" placeholder="mail">
        <button type="submit"> Enviar confirmacion</button>
     </form>
   </body>
 </html>
