
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<!-- CSRF Token -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin-Login | NSC Stationery</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend/admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('backend/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend/admin/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{route('frontend.home')}}"><img src="{{asset('frontend/img/nsc_logo.png')}}" width="150" alt=""></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{route('login')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" {{old('username')}} placeholder="Username" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required="" id="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fa fa-eye show-password-eye pr-2" style="color: #bfbfbf;"></i> 
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="text-center">
            @error('username')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @error('password')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
{{--             <button type="submit" class="btn btn-primary btn-block">Sign In</button>
 --}}          </div>
          <!-- /.col -->
        </div>
        <div class="social-auth-links text-center mb-3">
            <button type="submit" class="btn btn-block btn-primary">Sign in</button>
        </div>
      </form>
      <!-- /.social-auth-links -->
      <h6 class="text-center text-muted">Developed by <a target="_blank" href="https://www.webinfotech.net.in/">Webinfotech</a></h6>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="{{asset('backend/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/admin/dist/js/adminlte.min.js')}}"></script>
<script>
$('.show-password-eye').click(function() {
  var type = $('#password').attr('type');
  // alert(type);
  if (type == 'password') {
    $('#password').attr('type', 'text');
    $('.show-password-eye').removeClass('fa-eye');
    $('.show-password-eye').addClass('fa-eye-slash');
  } else {
    $('#password').attr('type', 'password');
    $('.show-password-eye').removeClass('fa-eye-slash');
    $('.show-password-eye').addClass('fa-eye');
  }
  });
</script>
</body>
</html>
