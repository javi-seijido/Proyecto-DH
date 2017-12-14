<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>menu</title>
  </head>
  <body>
       <h1>Hola</h1>

       <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
           Logout
       </a>

       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           {{ csrf_field() }}
       </form>

  </body>
</html>
