<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Adomx - Responsive Bootstrap 4 Admin Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admintema')}}/assets/images/favicon.ico">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('admintema')}}/assets/css/vendor/bootstrap.min.css">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('admintema')}}/assets/css/vendor/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="{{asset('admintema')}}/assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('admintema')}}/assets/css/vendor/themify-icons.css">
    <link rel="stylesheet" href="{{asset('admintema')}}/assets/css/vendor/cryptocurrency-icons.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('admintema')}}/assets/css/plugins/plugins.css">

    <!-- Helper CSS -->
    <link rel="stylesheet" href="{{asset('admintema')}}/assets/css/helper.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('admintema')}}/assets/css/style.css">

</head>

<body>

    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area login-bg">
        <div class="container">
            <div class="login-box ptb--100">
            <form action="{{route('resetPassword')}}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
                    <div class="login-form-head">
                        <h4 >Şifreyi Değiştir</h4>
                        <p></p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" readonly name="email" value="{{ $email ?? old
                                ('email')}}">
                            <i class="ti-email"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Şifre</label>
                            <input type="password" name="password">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Şifre Tekrarı</label>
                            <input type="password" name="password_confirmation">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Şifreyi Değiştir <i class="ti-arrow-right"></i></button>
                            <div class="login-other row mt-4">
                            </div>
                        </div>
                        <div class="form-footer text-center mt-2">
                            <p class="text-muted"><a href="{{url('/')}}">Giriş Yap</a></p>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

   <!-- JS
============================================ -->

    <!-- Global Vendor, plugins & Activation JS -->
    <script src="{{asset('admintema')}}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{asset('admintema')}}/assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="{{asset('admintema')}}/assets/js/vendor/popper.min.js"></script>
    <script src="{{asset('admintema')}}/assets/js/vendor/bootstrap.min.js"></script>
    <!--Plugins JS-->
    <script src="{{asset('admintema')}}/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{asset('admintema')}}/assets/js/plugins/tippy4.min.js.js"></script>
    <!--Main JS-->
    <script src="{{asset('admintema')}}/assets/js/main.js"></script>
</body>

</html>
