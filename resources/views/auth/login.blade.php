<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab-4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Mar 2020 04:48:22 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="{{ asset('fontend') }}/img/favicon.html">

    <title>Login-Inventory</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('fontend') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('fontend') }}/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('fontend') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('fontend') }}/css/style-responsive.css" rel="stylesheet" />


</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" method="POST" action="{{ route('login') }}">
        @csrf
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
            <input id="email" type="email" class="form-control mb-3" placeholder="User ID" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>

        </div>

      </form>

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('fontend') }}/js/jquery.js"></script>
    <script src="{{ asset('fontend') }}/js/bootstrap.bundle.min.js"></script>


  </body>

<!-- Mirrored from thevectorlab.net/flatlab-4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Mar 2020 04:48:23 GMT -->
</html>
