

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Registro de Personal</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../css/normalize.css">
	<link href="../css/styles_reg.css" rel="stylesheet">
	<link href="../css/style_menu.css" rel="stylesheet">

</head>
  <body>

      <form method="post" enctype="multipart/form-data" role="form" action="{{ route('crear_p') }}">

					{{ csrf_field() }}
        <h1 align="center"> Registro De Personal:    </h1>

        <div class="container">

                <div  class="personal_foto">

                  		<div id="mostrar">
                        <img class="foto_perfil" src="../images/sin_perfil2.png" alt="foto_perfil"><br>
											</div>


                        <input type="file" name="avatar" style="display:none;" id="botonFileReal">
												@if($errors->has('avatar'))
												<span style="margin-left: 29%;background-color: red;color: white;">{{ $errors->first('avatar') }}</span>
												@endif
                        <input class="input-file" type="button" value="Subir Foto" onclick="document.getElementById('botonFileReal').click();" style="">





                          <span style="color: red;"><img style="width: 8%;margin-left: 12%;display:none;" id="foto" src="../images/icon_error.png"></span>
                          <span style="margin-left: 3%;background-color: red;color: white;"></span>

                  <!-- </section> -->

                </div>




                <div class="personal_border">

                    <section class="datos_personales" id="personal">


                            <label class="label_usr" for="nombre">Nombre: </label>
                            <input class="us_campo"type="text" id="nombre" name="nombre">
															@if($errors->has('nombre'))
															<span style="margin-left: 36%;background-color: red;color: white;">{{ $errors->first('nombre') }}</span>
															@endif

                      				<span> <img class="error_icon" id="n1" src="../images/icon_error.png"></span>




                            <br><br>

                            <label class="label_usr"for="apellido">Apellido: </label>
                            <input class="us_campo" type="text" id="apellido" name="apellido">
															@if($errors->has('apellido'))
															<span style="margin-left: 36%;background-color: red;color: white;">{{ $errors->first('apellido') }}</span>
															@endif
                              <span style="color: red;"><img class="error_icon" id="n2" src="../images/icon_error.png"></span>


                            <br><br>


                            <label class="label_usr" for="edad">Edad: </label>
                            <input class="us_campo"type="text" id="edad" name="edad">
															@if($errors->has('edad'))
															<span style="margin-left: 36%;background-color: red;color: white;">{{ $errors->first('edad') }}</span>
															@endif
                              <span style="color: red;"><img class="error_icon" id="n3" src="../images/icon_error.png"></span>
                              <h3 class="span_error" id="n4">Formato Erroneo..!!!</h3>
                            <br><br>

                            <label class="label_usr">Genero:</label> <br>
                            <br>

                            <label class="genero">
                            <input type="radio" name="genero" id="genero" value="femenino"> Femenino
                          	</label>

                            <label class="genero">
                      			<input type="radio" name="genero" value="masculino" checked> Masculino
                      			</label>

                      			<label class="genero">
                            <input type="radio" name="genero" value="otro"> Otro
                        		</label>

                      		  <br><br>

                            <label class="label_usr" for="fnacimiento">Fecha de Nacimiento: </label>
                            <input class="us_campo" type="date" id="fnacimiento" name="fnacimiento">
															@if($errors->has('fnacimiento'))
															<span style="margin-left: 36%;background-color: red;color: white;">{{ $errors->first('fnacimiento') }}</span>
															@endif
														<span style="color: red;"><img class="error_icon" id="n5" src="../images/icon_error.png"></span>
														<h3 class="span_error" id="n6">Formato Erroneo..!!!</h3>

                          <br><br>



                            <label class="label_usr"for="dni">Numero de DNI: </label>
                            <input class="us_campo"type="tex" id="dni" name="dni">
															@if($errors->has('dni'))
															<span style="margin-left: 36%;background-color: red;color: white;">{{ $errors->first('dni') }}</span>
															@endif
														<span style="color: red;"><img class="error_icon" id="n7" src="../images/icon_error.png"></span>
														<h3 class="span_error" id="n8">Formato Erroneo..!!!</h3>
                          <br><br>


                            <label class="label_usr" for="telefonomovil">Telefono Movil: </label>
                            <input class="us_campo"type="tex" id="telefonomovil" name="telefonomovil">
															@if($errors->has('telefonomovil'))
															<span style="margin-left: 36%;background-color: red;color: white;">{{ $errors->first('telefonomovil') }}</span>
															@endif
														<span style="color: red;"><img class="error_icon" id="n9" src="../images/icon_error.png"></span>
														<h3 class="span_error" id="n10">Formato Erroneo..!!!</h3>
                            <br><br>

                            <label class="label_usr" for="email">Correo electrónico:</label>
                            <input class="us_campo" type="text" id="email" name="email">
															@if($errors->has('email'))
															<span style="margin-left: 36%;background-color: red;color: white;">{{ $errors->first('email') }}</span>
															@endif
														<span style="color: red;"><img class="error_icon" id="n11" src="../images/icon_error.png"></span>
														<h3 class="span_error" id="n12">Formato Erroneo..!!!</h3>
                            <br><br>

                            <label class="label_usr">Direccion:</label>
                            <br><br>
                            <label class="label_usr">Calle:</label>

														<select class="us_campo" name="calle">

															@foreach ($streets as $street)
																	<option value="{{ $street['id'] }}">{{ $street['name'] }}</option>
															@endforeach



                            </select>

														<span style="color: red;"><img class="error_icon" id="n13" src="../images/icon_error.png"></span>
														<h3 class="span_error" id="n14">Formato Erroneo..!!!</h3>

                            <br><br>



                            <label class="label_usr"for="num_calle">Calle Numero: </label>
                            <input class="us_campo"type="tex" name="num_calle">
														@if($errors->has('num_calle'))
														<span style="margin-left: 36%;background-color: red;color: white;">{{ $errors->first('num_calle') }}</span>
														@endif

														<span style="color: red;"><img class="error_icon" id="n15" src="../images/icon_error.png"></span>
														<h3 class="span_error" id="n16">Formato Erroneo..!!!</h3>
                          <br><br>


                            <label class="label_usr">Localidad:</label>

                            <select class="us_campo" name="localidad">
															@foreach ($locations as $value)
																	<option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
															@endforeach


                            </select>

														<span style="color: red;"><img class="error_icon" id="n17" src="../images/icon_error.png"></span>
														<h3 class="span_error" id="n18">Formato Erroneo..!!!</h3>

                            <br>

                            <br><br>

                  </section>

                </div>




                <div class="personal_operativo">

                  <section class="datos_operativos" id="operativo">

                      <label class="label_usr">Escalafon:</label>
                      <select class="us_campo" name="escalafon">
												@foreach ($ranks as $value)
														<option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
												@endforeach

                    	</select>

										<span style="color: red;"><img class="error_icon" id="n19" src="../images/icon_error.png"></span>
										<h3 class="span_error" id="n20">Formato Erroneo..!!!</h3>
                    <br><br>



                    <label class="label_usr" for="falta">Fecha de Alta: </label>
                    <input class="us_campo" type="date" id="falta" name="falta">
											@if($errors->has('falta'))
											<span style="margin-left: 36%;background-color: red;color: white;">{{ $errors->first('falta') }}</span>
											@endif
										<span style="color: red;"><img class="error_icon" id="n21" src="../images/icon_error.png"></span>
										<h3 class="span_error" id="n22">Formato Erroneo..!!!</h3>
                  <br><br>

                    <label class="label_usr" for="fbaja">Fecha de Baja: </label>
                    <input class="us_campo" type="date" id="fbaja" name="fbaja">
											@if($errors->has('fbaja'))
											<span style="margin-left: 36%;background-color: red;color: white;">{{ $errors->first('fbaja') }}</span>
											@endif
										<span style="color: red;"><img class="error_icon" id="23" src="../images/icon_error.png"></span>
										<h3 class="span_error" id="n24">Formato Erroneo..!!!</h3>
                    <br><br><br>

                     <label>Cursos e Informaion Adicional:</label> <br><br>
                     <textarea class="tex-tarea"name="info"></textarea>
                     <br><br>
                     <br><br>
                          <button class="input" type="submit">Crear</button>
                          <button class="input" type="modificar">Editar</button>
                          <button class="input" type="retroceder"><<<</button>
                          <button class="input" type="avanzar">>>></button>
                          <button class="buscar_button" type="submit">Buscar</button>


                 </section>
      </div>
    </div>

</form>
      <footer class="footer_reg">

          <a href="/menu">
              <img class="volver_logo" src="../images/volver.png">

          </a>

      </footer>



  </body>
  <script src="../js/validar_personal.js"></script>

</html>
