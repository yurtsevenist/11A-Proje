<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Şifremi Unuttum</title>
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

<body class="skin-dark">

    <div class="main-wrapper">

        <!-- Content Body Start -->
        <div class="content-body m-0 p-0">

            <div class="login-register-wrap">
                <div class="row">

                    <div class="d-flex align-self-center justify-content-center order-2 order-lg-1 col-lg-5 col-12">
                        <div class="login-register-form-wrap">

                            <div class="content">
                                <h1>Şifre Sıfırlama</h1>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>

                            <div class="login-register-form">
                                @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                                @endif

                                <form action="{{route('forgotPost')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mb-20"><input class="form-control" type="text" name="email" placeholder="E-Posta Adresiniz" required></div>


                                        <div class="col-12">
                                            <div class="row justify-content-between">
                                                <div class="col-auto mb-15"><button type="submit" class="button button-primary button-outline">Şifre Sıfırlama</button></div>
                                                <div class="col-auto mb-15"><a href="{{url('login')}}">Giriş</a></div>

                                            </div>
                                        </div>
                                        <div class="col-12 mt-10">Henüz Üye Değilim? <a href="{{url('register')}}">Yeni Üye</a></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="login-register-bg order-1 order-lg-2 col-lg-7 col-12">
                        <div class="content">
                            <h1>Sign in</h1>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div><!-- Content Body End -->

    </div>

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
