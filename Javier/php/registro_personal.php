<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro de Personal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
		<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="../css/normalize.css">
    <link href="../css/styles_reg.css" rel="stylesheet">

  </head>
  <body>


        <h1 align="center"> Registro De Personal:    </h1>
        <br><br>

        <div class="container">

                <form class="personal_border">

                  <section class="datos_personales">



                            <img class="foto_perfil" src="../images/bombero.jpg" alt="foto_perfil">

                            <br><br>

                  </section>

                    <section class="datos_personales">
                            <label class="label_usr" for="legajo">Legajo N°:</label>
                            <input class="us_campo"type="text" name="legajo" id="legajo" required>
                            <br><br>


                            <label class="label_usr" for="nombre">Nombre: </label>
                            <input class="us_campo"type="text" name="nombre" id="nombre" required>
                            <br><br>

                            <label class="label_usr"for="apellido">Apellido: </label>
                            <input class="us_campo" type="text" name="apellido" id="apellido" required>
                            <br><br>

                            <label class="label_usr" for="edad">Edad: </label>
                            <input class="us_campo"type="text" name="edad" id="edad" required>
                            <br><br>

                            <label class="label_usr">Genero:</label> <br>
                            <br>
                            <label class="genero">
                      			<input type="radio" name="genero" checked>
                      				Femenino
                      			</label>
                      			<label class="genero">
                      			<input type="radio" name="genero">
                      				Masculino
                      			</label>
                      			<label class="genero">
                      			<input type="radio" name="genero">
                      				Otro
                      			</label>
                            <br><br>

                            <label class="label_usr" for="fnacimiento">Fecha de Nacimiento: </label>
                            <input class="us_campo" type="date" name="fnacimiento" id="fnacimiento" required>
                            <br><br>

                            <label class="label_usr"for="dni">Numero de DNI: </label>
                            <input class="us_campo"type="number" name="dni" id="dni" required>
                            <br><br>

                            <label class="label_usr" for="telefonomovil">Telefono Movil: </label>
                            <input class="us_campo"type="number" name="telefonomovil" id="telefonomovil" placeholder="ej: 1157025896 10 Nueros"required>
                            <br><br>

                            <label class="label_usr" for="correo">Correo electrónico:</label>
                            <input class="us_campo" type="email" name="correo" id="correo" placeholder="email@server.com"required>
                            <br><br>

                            <label class="label_usr">Direccion:</label>
                            <br><br>
                            <label class="label_usr" for="dir_calle">Calle:. </label>
                            <input class="us_campo"type="text" name="dir_calle" id="dir_calle" required>
                            <br><br>
                            <label class="label_usr" for="num_calle">Numero:</label>
                            <input class="us_campo"type="number" name="num_calle" id="num_calle" required>
                            <br><br>
                            <label class="label_usr">Localidad:</label>
                                <select class="us_campo" name="localidad"required>
                                      <option value="av">Avellaneda</option>
                                      <option value="sar">Sarandi</option>
                                      <option value="vd">Villa Dominico</option>
                                </select>
                            <br><br>

                  </section>

                </form>


                <form class="personal_operativo">

                  <section class="datos_operativos">

                      <label class="label_usr">Escalafon:</label>
                      <select class="us_campo" name="escalafon"required>
                            <option value="jefe">Jefe de Cuerpo</option>
                            <option value="sjefe">Segundo Jefe</option>
                            <option value="of">Oficiales</option>
                            <option value="sof">Sub Oficiales</option>
                            <option value="bomb">Bomberos</option>
                      </select>
                      <br><br>


                      <label class="label_usr" for="falta">Fecha de Alta:</label>
                      <input class="us_campo" type="date" name="falta" id="fbaja"required>
                      <br><br>
                      <label class="label_usr" for="fbaja">Fecha de Baja:</label>
                      <input class="us_campo"type="date" name="fbaja" id="fbaja"required>
                      <br><br>


                     <label>Cursos e Informaion Adicional:</label> <br><br>
                     <textarea class="tex-tarea"name="info" required></textarea>
                     <br><br>
                     <br><br>
                          <button class="input" type="crear">Crear</button>
                          <button class="input" type="modificar">Editar</button>
                          <button class="input" type="retroceder"><<<</button>
                          <button class="input" type="avanzar">>>></button>
                          <button class="buscar_button" type="submit">Buscar</button>

                 </section>
      </form>
    </div>
      <footer class="footer_reg">

          <a href="main_menu.php">
              <img class="volver_logo" src="../images/volver.png">

          </a>

      </footer>



  </body>
</html>
