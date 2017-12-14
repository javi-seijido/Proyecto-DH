<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>prueba</title>
    <meta name="viewport" content="width=device-width. initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles_log.css">
  </head>
  <body>
        <header>
           <img class="logo_bomberos" src="../images/Logo3_Transparente.png" alt="logo_bomberos">
        </header>

        <form id="form_login" class= "loguin_border" action="/index" method="post">
           <input type='hidden' name='_token' value='{{ csrf_token() }}'>

       		 <img class="img_usr" src="../images/loguin.png" alt="">
     			 <section class="loguin_usr">

       					<label class="label_usr" for="user">Usuario: </label>

       					<input id="usr" class="us_log" type="text" name="usr" placeholder=" User" value=''>
                <div id="err_user">
                  <img class="error_usr" src="../images/logo_errores.png" alt="">
                </div>
                <br><br>

       					<div class="pos_ayes">
       						<label class="label_usr" for="pass">Password: </label>
       						<input class="pa_log" id="myPassword" type="password" name="pass" placeholder=" Password" >

       						<img class="ayes"src="../images/ayes_pass.svg" alt="ver_pass" onclick="mouseoverPass()" onmouseout="mouseoutPass()">
       					</div>
                <div id="err_pass" class="div_err_pass">
                  <img class="error_pass" src="../images/logo_errores.png" alt="">
                </div>
     						<!-- <button class="borrar" type="reset">Borrar</button> -->
     			 </section>
     		 <a class="change_pass" href="#recuperar_pass">¿Olvido su contraceña?</a>

     		 <label class="remember"> Remember me.
     			 <input  type="checkbox" name="remember" id="remember"> <br><br>
     		 </label>

     		 <button class="input" type="submit"> Loguin.
     		 </button>

     		</form>

        <div id="recuperar_pass" class="loguin_border">
          <p class="">Ingrese su Correo electronico para restaurar su possword:</p><br>

          <form class="enviar_email" action="" method="get">
            <label  class="" for="email">Email:</label>
            <input  type="email" name="email" value="" placeholder="ejemplo@email.com">
            <button class="enviar" type="submit">Enviar</button>
          </form>

          <span id="cerrar_rec">Cerrar</span>
        </div>

        <div class="reset_pass">
          <form class="" action="" method="post">
                <label  class="label_new_pass" for="new_pass1">Nueva Password:</label>
                <input id="new_pass" class="us_log" type="password" name="" value=""><br><br>

                <label class="label_new_pass" for="new_pass1">Confirmar Password:</label>
                <input id="new_pass" class="us_log" type="password" name="" value=""><br><br>

                <button class="input" type="submit">Guardar</button>
          </form>

        </div>

        <script src="js/control-login.js"></script>
  </body>
</html>
