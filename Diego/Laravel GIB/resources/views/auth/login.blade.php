@extends('layouts.app')
@section('links')
<link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
<link href="/css/styles_log.css" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <!-- <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div> -->
                <header>
                   <img class="logo_bomberos" src="../images/Logo3_Transparente.png" alt="logo_bomberos">
                </header>
                <!-- <div class="panel-body"> -->


                    <form id="form_login" class= "loguin_border" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <img class="img_usr" src="../images/loguin.png" alt="">

                        <section class="loguin_usr">
                        <!-- <div class="form-group{{ $errors->has('usr') ? ' has-error' : '' }}"> -->
                            <!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->
                            <label class="label_usr" for="user">Usuario: </label>

                            <!-- <div class="col-md-6"> -->
                                <!-- <input id="usr" class="us_log" type="text" name="username" placeholder=" User" value="{{ old('usr') }}" autofocus> <br><br> -->
                                <input id="usr" class="us_log" type="text" name="email" placeholder=" Email" value="{{ old('email') }}" autofocus> <br><br>
                                <!-- <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus> -->
                                <div id="err_user">
                                  <img class="error_usr" src="../images/logo_errores.png" alt="">
                                </div>


                                <!-- <input id="usr" class="us_log" type="text" name="email" placeholder="email" value="{{ old('email') }}" autofocus> <br><br> -->
                                <!-- <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus> -->
                                <div id="err_user">
                                  <img class="error_usr" src="../images/logo_errores.png" alt="">
                                </div>
                                <!-- @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif -->
                            <!-- </div> -->
                        <!-- </div> -->

                        <!-- <div class="form-group{{ $errors->has('pass') ? ' has-error' : '' }}"> -->


                            <!-- <label for="password" class="col-md-4 control-label">Password</label> -->

                            <!-- <div class="col-md-6"> -->
                                <!-- <input id="password" type="password" class="form-control" name="password" required> -->
                                <div class="pos_ayes">
                                  <label class="label_usr" for="pass">Password: </label>
                                  <input class="pa_log" id="myPassword" type="password" name="password" placeholder=" Password" >
                                  <img class="ayes"src="../images/ayes_pass.svg" alt="ver_pass" onclick="mouseoverPass()" onmouseout="mouseoutPass()">
                                </div>
                                <div id="err_pass" class="div_err_pass">
                                  <img class="error_pass" src="../images/logo_errores.png" alt="">
                                </div>
                                <!-- @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif -->
                            <!-- </div> -->
                        <!-- </div> -->

                        </section>

                        <a class="change_pass" href="{{ route('password.request') }}">
                          ¿Olvido su contraceña?
                        </a>

                        <label class="remember"> Remember me.
                          <input  type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="remember"> <br><br>
                        </label>

                        <!-- <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox"> -->

                                    <!-- <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label> -->
                                <!-- </div>
                            </div>
                        </div> -->

                        <!-- <div class="form-group">
                            <div class="col-md-8 col-md-offset-4"> -->
                                <button class="input" type="submit"> Loguin.</button>
                                <!-- <button type="submit" class="btn btn-primary">
                                    Login
                                </button> -->

                                <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a> -->
                            <!-- </div>
                        </div> -->
                    </form>

                    @if (count($errors) > 0)
                      <div class="err_border">
                        @foreach ($errors->all() as $error)
                        <!-- <li>{{ $error }}</li> -->
                             <img src="../images/logo_errores.png" alt="">
                             <span class="men_er_usr_360" > {{ $error }}</span><br><br>
                        @endforeach
                      </div>
                    @endif
                <!-- </div>
            </div>
        </div>
    </div> -->
</div>
@endsection
