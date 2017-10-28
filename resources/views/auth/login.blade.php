@extends('layouts.app')

@section('content-not-auth')





@if (Auth::guest())




<div class="hold-transition login-page">

<div class="login-box">
    
  <div class="login-logo">
    <a href="{{ url('/')}}"><b>LatestCase</b>Law</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
            @if ($errors->has('email'))
    <div class="error-login">
        {{ $errors->first('email') }}
        <!-- session('erro_login') -->
    </div>
    @endif
    <p class="login-box-msg">Sign in to start your session</p>

    <form role="form" method="POST" action="{{ route('login') }}" >
      <div class="form-group has-feedback">
        <!-- <input type="email" class="form-control" placeholder="Email"> -->
        {{ csrf_field() }}
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
 
      <div class="form-group has-feedback">
        <!-- <input type="password" class="form-control" placeholder="Password"> -->
        <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
       @if ($errors->has('password'))
       {{ $errors->first('password') }}
       @endif
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <!-- <input type="checkbox"> Remember Me -->
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat login-btn-lcl">LogIn</button>
        </div>


                               
        <!-- /.col -->
      </div>
    </form>
    <!-- 
    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    -->
    <!-- /.social-auth-links -->
     <a class="btn btn-link" href="{{ route('password.request') }}">Forgot Your Password?</a><br>
    <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->


</div>





 @endif






























<!-- <div class="login-page">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <div>
                @if (session('status'))
                <div class="alert alert-danger">
                {{ session('status') }}
                </div>
                @endif
            </div>
            <div class="panel panel-default">
            
                <div class="panel-heading">Login</div>
              
               
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}

                                         session('erro_login')
                                         
                                        </strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 ">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
 -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
    <script src="{{ asset('dist/js/demo.js')}}"></script>
    <script src="{{ asset('plugins/iCheck/icheck.min.js')}}"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
</script>
@endsection
