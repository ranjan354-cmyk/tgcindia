<!DOCTYPE html>

<html lang="en">



<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>TGC India | Login</title>



  <!-- Google Font: Source Sans Pro -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="{{url('assets/plugins/fontawesome-free/css/all.min.css')}}">

  <!-- icheck bootstrap -->

  <link rel="stylesheet" href="{{url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

  <!-- Theme style -->

  <link rel="stylesheet" href="{{url('assets/dist/css/adminlte.min.css')}}">

</head>



<body class="hold-transition login-page">



<div class="container">
<div class="row">
<div class="col-md-6">
<div class="login_img">
 <img src="{{url('assets/front/img/login.png')}}" alt="Login">
</div>
</div>

<div class="col-md-6">
 <div class="login-box">

    <div class="login-logo">

      <img src="{{url('assets/front/img/logo.png')}}" alt="Logo" />

      <br>

      <a><b>TGC</b> India</a>

    </div>

    <!-- /.login-logo -->

    <div class="card">

      <div class="card-body login-card-body">

        <p class="login-box-msg">Sign in to start your session</p>

        @if(session()->has('error'))

        <div class="alert alert-danger">

          {{ session()->get('error') }}

        </div>

        @endif

        <form method="POST" action="{{ route('custom-login') }}">

          @csrf

          <div class="input-group mb-3">

            <input type="email" placeholder="Email" id="email" type="email" onchange="sendMailVerify(this.value)" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            <div class="input-group-append">

              <div class="input-group-text">

                <span class="fas fa-envelope"></span>

              </div>

            </div>

            @error('email')

            <span class="invalid-feedback" role="alert">

              <strong>{{ $message }}</strong>

            </span>

            @enderror

          </div>

          <div class="input-group mb-3">

            <input id="password" type="password" onchange="verifyOtp(this.value)" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

            <div class="input-group-append">

              <div class="input-group-text">

                <span class="fas fa-lock lock-password" onclick="passwordShowHide(1)"></span>

                <span class="fas fa-unlock unlock-password" onclick="passwordShowHide(2)" style="display:none"></span>

              </div>

            </div>



            @error('password')

            <span class="invalid-feedback" role="alert">

              <strong>{{ $message }}</strong>

            </span>

            @enderror

          </div>

          <div class="row">

            <div class="col-8">

              <div class="icheck-primary">

                <input type="checkbox" id="remember">

                <label for="remember">

                  Remember Me

                </label>
                

              </div>
             <!-- <span id="show-otp" ></span>  ----->

            </div>

            <!-- /.col -->

            <div class="col-4">

              <button type="submit" id="submit" class="btn btn-primary btn-block" disabled>Sign In</button>

            </div>

            <!-- /.col -->

          </div>

        </form>





        <!-- /.social-auth-links --



      <p class="mb-1">

        <a href="{{url('forgot-password')}}">I forgot my password</a>

      </p>

      <p class="mb-0">

        <a href="{{url('register')}}" class="text-center">Register a new membership</a>

      </p>

        -->

      </div>

      <!-- /.login-card-body -->

    </div>

  </div>

</div>

</div>
</div>










 
  <!-- /.login-box -->



  <!-- jQuery -->

  <script src="{{url('assets/plugins/jquery/jquery.min.js')}}"></script>

  <!-- Bootstrap 4 -->

  <script src="{{url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- AdminLTE App -->

  <script src="{{url('assets/dist/js/adminlte.min.js')}}"></script>



  <script>

    function passwordShowHide(id) {

      var passwordField = document.getElementById('password');

      if (id == 1) {

        $('.lock-password').hide();

        $('.unlock-password').show();

        passwordField.type = 'text';

      } else {

        $('.lock-password').show();

        $('.unlock-password').hide();

        passwordField.type = 'password';

      }

    }





    function sendMailVerify(email) {

    
      $.ajax({
        url: '{{ url("ajax/checkEmail") }}',
        type: 'GET',
        data: {
          email: email
        },
        dataType: 'json',
        success: function(response) {
          if(response.data.type == 'Invalid'){
            alert('You entered wrong email id');
            $('#email').val('');
          } else {
            $('#show-otp').html("Your OTP is:-  " + response.data.otp);
          }
        },
        error: function(error) {
          console.log(error);
        }
      });
    }



    function verifyOtp(otp){

      var email = $('#email').val();
      const signInButton = document.getElementById('submit');
      $.ajax({
        url: '{{ url("ajax/verifyOtp") }}',
        type: 'GET',
        data: {
          otp: otp,
          email: email
        },
        dataType: 'json',
        success: function(response) {
          if(response.data == 'Invalid'){
            alert('You entered wrong Password');
            $('#password').val('');
            signInButton.disabled = true;
          } else {
            signInButton.disabled = false;
          }
        },
        error: function(error) {
          console.log(error);
        }
      });

    }

  </script>





</body>



</html>