<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="KeyKost">
  	<meta name="author" content="KeyKost" />

    <title>KeyKost</title>
    <link rel="icon" href="{{ asset('uploads/Logo/logo_tabbrowser.png') }}" type="image" sizes="16x16"> <!------------------------------------------ ICON-------------->

    <!-- Bootstrap -->
    <link href="{{ asset('Template/AdminPage/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('Template/AdminPage/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('Template/AdminPage/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('Template/AdminPage/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{ asset('Template/AdminPage/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Select2 -->
    <link href="{{ asset('Template/AdminPage/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('Template/AdminPage/build/css/custom.min.css') }}" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="{{ asset('css/sweetalert/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert/sweetalert2.css') }}" rel="stylesheet">

    <!-- Social Login Button -->
    <link href="{{ asset('css/bootstrap-social/bootstrap-social.css') }}" rel="stylesheet">


  </head>

  <body class="login">

    <div>

      <div class="login_wrapper">

        <div class="animate form login_form" >
          <section class="login_content">

            <form action="{{ route('user.auth.login') }}" method="post">
              {{ csrf_field() }}
              <h1>KeyKost Admin Login</h1>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div class="clearfix"></div>

              <button type="submit" class="btn btn-default submit" >Log in</button>
              <!-- <a class="reset_pass" href="#">Lupa password?</a> -->
            </form>
          </section>
        </div>

      </div>
    </div>

    <!-- Sweet Alert -->
    <script src="{{ asset('js/sweetalert/sweetalert2.js') }}"></script>

    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')

  </body>
</html>
