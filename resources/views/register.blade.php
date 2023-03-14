<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Üye Kayıt</title>
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
                                <h1>Üye Kayıt</h1>
                                <p>Formdaki alanları eksiksiz doldururak üye olabilirsiniz.</p>
                            </div>
                            @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                            @endif
                            <div class="login-register-form">
                                <form action="{{route('registerPost')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mb-20"><input class="form-control" type="text" name="name" required value="{{old('name')}}" placeholder="Adınız Soyadınız"></div>
                                        <div class="col-12 mb-20"><input class="form-control" type="email" name="email" value="{{old('email')}}" required placeholder="E-Posta Adresiniz"></div>
                                        <div class="col-12 mb-20"><input class="form-control" type="password" name="password"  required placeholder="Şifreniz"></div>
                                        <div class="col-12 mb-20"><input class="form-control" type="password" name="password_confirmation"  required placeholder="Şifre Tekrar"></div>
                                        <div class="col-12">
                                            <div class="row justify-content-between">
                                                <div class="col-auto mb-15">Üyeliğim var? <a href="{{url('/')}}">Giriş yap.</a></div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-10"><button type="submit" class="button button-primary button-outline">Üye Ol</button></div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="login-register-bg order-1 order-lg-2 col-lg-7 col-12">
                        <div class="content">
                            <h1>Üye Ol</h1>
                            <p>Formdaki alanları eksiksiz doldururak üye olabilirsiniz.</p>
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
