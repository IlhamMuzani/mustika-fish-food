<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mustika | Fish Food</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/adminlte.min.css') }}">
  {{-- Boostrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="hold-transition login-page">
  <div class="login-box">
    @if (session('success'))
      <div class="alert alert-primary alert-dismissible" user="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if (session('error'))
      <div class="alert alert-danger alert-dismissible" user="alert">
        <h5 class="text-danger">Error!</h5>
        <p>
          @foreach (session('error') as $error)
            -&nbsp; {{ $error }} <br>
          @endforeach
        </p>
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="login-logo">
      <a href="#"><b>Mustika</b> Fish Food</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ route('login.action') }}" method="post">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email"
              autofocus value="{{ Session::get('email') }}" />
            @error('email')
              <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="password">Password</label>
            </div>
            <div class="input-group input-group-merge">
              <input type="password" id="password" class="form-control" name="password"
                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                aria-describedby="password" value="{{ Session::get('password') }}" />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              @error('password')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Sign In</button>

        </form>

        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="forgot-password.html"></a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center"></a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('adminLTE/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
