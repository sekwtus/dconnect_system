
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png')}}">
    <title>Dconnect</title>
    <!-- page css -->
    <link href="{{ asset('assets/dist/css/pages/login-register-lock.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/dist/css/style.min.css')}}" rel="stylesheet">

    <style>
        img.avatar {
        width: 90%;
        border-radius: 50%;
}
    </style>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div style="background-image:url({{ asset('assets/images/background/bg.png')}}); background-size: cover;
        background-repeat: no-repeat; background-position: center center; height: 100%; width: 100%; position: fixed; ">
        <div class="login-register">
            <div class="login-box card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="form-horizontal form-material text-center" id="loginform">
                    @csrf
                        <div class="imgcontainer">
                            <img src="{{ asset('assets/images/background/logo.png')}}" alt="Avatar" class="avatar">
                        </div>
                        <h4 class="text-center m-b-20"><b>Performance management system</b></h4>
                        <h6 class="text-center m-b-20">Enter your details below</h6>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row button-group">
                            {{-- <div class="col-xs-12 p-b-20">
                                <button class="btn waves-effect waves-light btn-lg btn-info" type="submit">SIGN IN</button>
                                <button type="button" class="btn waves-effect waves-light btn-lg btn-dark">Cancel</button>
                            </div> --}}
                            <div class="col-lg-6 col-md-4">
                                <button class="btn waves-effect btn-block waves-light btn-lg btn-info" type="submit">SIGN IN</button>
                            </div>
                            <div class="col-lg-6 col-md-5">
                                <button type="button" class="btn waves-effect btn-block waves-light btn-lg btn-dark">REGISTER</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/node_modules/popper/popper.min.js')}}"></script>
    <script src="{{ asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ==============================================================
        // Login and Recover Password
        // ==============================================================
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>

</body>

</html>
