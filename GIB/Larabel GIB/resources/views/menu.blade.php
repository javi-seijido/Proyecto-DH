<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <title>Menú Principal GIB</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/style_menu.css">
  </head>
  <body>
    <header>


      <nav id="navigation2" class="menu_logeado">

        <div class="control-menu2">
              @if (Auth::check())
                   <a href="#" class="user_login">{{ Auth::user()->email }}</a>
             @endif
            <a href="#" id="user-logaut">
               <img class="img_user" src="../images/image-login.jpg" alt="">
            </a>

        </div>

        <ul  class="nav-items2">
          <li><a href="#>">Cambiar Password</a></li>

          <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>
            <!-- <a href="logout.php">Cerrar Sesion</a> -->
          </li>
        </ul>

      </nav>

      <nav id="navigation" class="menu">

            <div class="control-menu">
                <a href="#navigation" class="open"><span><img class="img_ctrol" src="../images/home.gif" /></span></a>
                <a href="#" class="close"><span><img class="img_ctrol" src="../images/home.gif" /></span></a>
            </div>

            <ul class="nav-items">

              <li class="li_flecha" id="Usuarios"><a href="/usuarios"> <span>ABM Usuarios</span>
                                 <img class="img_consultas" src="../images/select.png" alt=""></a></li></a></li>

              <li class="li_flecha" id="Personal"><a href="/personal"><span>ABM Personal</span>
                                 <img class="img_consultas" src="../images/select.png" alt=""></a></li>

              <li class="li_flecha" id="Alarmas"><a href="ejemplo_browser.php"><span>ABM Alarmas</span>
                                <img class="img_consultas" src="../images/select.png" alt=""></a></li>

              <li class="li_flecha" id="Suministros"><a href="#Suministros"><span>ABM Suministros</span>
                                <img class="img_consultas" src="../images/select.png" alt=""></a></li>

              <li class="li_flecha" id="Procedimientos">
                <a href="/procedimientos"><span>Procedimientos</span>
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

     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         {{ csrf_field() }}
     </form>

     <script src="{{ asset('js/control-logaut.js') }}"></script>
  </body>
</html>
