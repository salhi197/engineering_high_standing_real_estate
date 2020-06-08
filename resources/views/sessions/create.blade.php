<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Group-3i | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
{!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
  {!! Html::style('bower_components/font-awesome/css/font-awesome.min.css') !!}
     {!! Html::style('bower_components/Ionicons/css/ionicons.min.css') !!}
      {!! Html::style('dist/css/AdminLTE.min.css') !!}
        {!! Html::style('dist/css/skins/_all-skins.min.css') !!}
      
      {!! Html::style('plugins/iCheck/square/blue.css') !!}
        {!! Html::style('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic') !!}
 
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Groupe </b>3i</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Connectez-vous pour commencer votre session</p>

    <form  method="post" action="/login">
      {{ csrf_field() }}
      <div class="form-group has-feedback {{ $errors->has('email') ? ' is-invalid' : '' }}">
        <input type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" id="email" name="email" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
         @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
      </div>
      <div class="form-group has-feedback {{ $errors->has('password') ? ' is-invalid' : '' }}">
        <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
           @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" id="remember"> Souviens-toi de moi
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Connexion </button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   

  </div>
  <!-- /.login-box-body -->
</div>


{!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
{!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
{!! Html::script('plugins/iCheck/icheck.min.js') !!}
{!! Html::script('bower_components/fastclick/lib/fastclick.js') !!}
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
