<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
    <link href="/css/styles_log.css" rel="stylesheet">

    <title>Reset Password</title>

    <!-- Styles -->
</head>
<body>
    <!-- <div id="app">
      <div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <div class="panel panel-default">
                      <div class="panel-heading">Reset Password</div>

                      <div class="panel-body"> -->
                          <!-- @if (session('status'))
                              <div class="alert alert-success">
                                  {{ session('status') }}
                              </div>
                          @endif -->

                          <form class= "loguin_border" method="POST" action="{{ route('password.email') }}">
                              {{ csrf_field() }}

                              <!-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                  <div class="col-md-6"> -->
                                      <label class="label_usr" for="user">Email: </label>
                                      <input id="email" type="email" class="us_log" name="email" value=" " placeholder="xxxxx@email.com.ar" required>

                                      <!-- @if ($errors->has('email'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                      @endif -->
                                  <!-- </div>
                              </div> -->

                              <button type="submit" class="input">
                                  Reset Password
                              </button>
                          </form>
                      <!-- </div>
                  </div>
              </div>
          </div>
      </div>

    </div> -->

    <!-- Scripts -->

</body>
</html>
