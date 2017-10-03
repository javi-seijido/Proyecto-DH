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
   <header>
   	 <img class="logo_bomberos" src="../images/Logo3_Transparente.png" alt="logo_bomberos">
   </header>

	 <form class= "loguin_border" action="main_menu.php" method="post">
  		 <img class="img_usr" src="../images/loguin.png" alt="">
			 <section class="loguin_usr">

					<label class="label_usr" for="user">Usuario: </label>
					<input class="us_log" type="text" name="usr" placeholder=" User" id="usr" required> <br><br>

					<div class="pos_ayes">
						<label class="label_usr" for="pass">Password: </label>
						<input class="pa_log" type="password" name="pass" placeholder=" Password" id="pass" required>
						<img class="ayes"src="../images/ayes_pass.svg" alt="ver_pass" >
					</div>
						<!-- <button class="borrar" type="reset">Borrar</button> -->
			 </section>
		 <a class="change_pass" href="reset_pass.html">¿Olvido su contraceña?</a>

		 <label class="remember"> Remember me.
			 <input  type="checkbox" name="remember" id="remember"> <br><br>
		 </label>

		 <button class="input" type="submit"> Loguin.
		 </button>

		</form>
	</body>
</html>
