<header>

  <nav id="navigation2" class="menu_logeado">

    <div class="control-menu2">
        <a href="#navigation2" class="open2"><span class="text_user"><?=strtoupper($usrname)?></span> <img class="img_user" src="<?= $images[0] ?>" alt=""></a>
        <a href="#" class="close2"><span class="text_user"><?=strtoupper($usrname)?></span> <img class="img_user" src="<?= $images[0] ?>" alt=""></a>
    </div>

    <ul  class="nav-items2">
      <li><a href="#>">Cambiar Password</a></li>
      <li><a href="logout.php">Cerrar Sesion</a></li>
    </ul>

  </nav>

  <nav id="navigation" class="menu">

        <div class="control-menu">
            <a href="#navigation" class="open"><span><img class="img_ctrol" src="../images/home.gif" /></span></a>
            <a href="#" class="close"><span><img class="img_ctrol" src="../images/home.gif" /></span></a>
        </div>

        <ul class="nav-items">

          <li class="li_flecha" id="Usuarios"><a href="login_usuarios.php"> <span>ABM Usuarios</span>
                             <img class="img_consultas" src="../images/select.png" alt=""></a></li></a></li>

          <li class="li_flecha" id="Personal"><a href="registro_personal.php"><span>ABM Personal</span>
                             <img class="img_consultas" src="../images/select.png" alt=""></a></li>

          <li class="li_flecha" id="Alarmas"><a href="ejemplo_browser.php"><span>ABM Alarmas</span>
                            <img class="img_consultas" src="../images/select.png" alt=""></a></li>

          <li class="li_flecha" id="Suministros"><a href="#Suministros"><span>ABM Suministros</span>
                            <img class="img_consultas" src="../images/select.png" alt=""></a></li>

          <li class="li_flecha" id="Procedimientos"><a href="faq.php"><span>Procedimientos</span>
                            <img class="img_consultas" src="../images/select.png" alt=""></a></li>

          <li class="li_flecha" id="Consultas"><a href="#Consultas"><span>Consultas/Informes</span>
                            <img class="img_consultas" src="../images/select.png" alt="">
                            <ul id= "sub_consultas">
                              <li> consulta 1</li>
                              <li> consulta 2</li>
                              <li> consulta 3</li>
                            </ul>

                          </a>



          </li>

        </ul>

  </nav>
  <div style="clear: both;"></div>
</header>
