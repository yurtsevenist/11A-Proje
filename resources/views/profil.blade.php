     @extends('layouts.master')
     @section('content')
        <!-- Content Body Start -->
        <div class="content-body">
            <div class="row">
                <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h3 class="title">Profil Bilgilerim</h3>
                        </div>
                    <div class="box-body login-register-form">
                        <form action="{{route('userUpdatePost')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-20"><input class="form-control" type="text" name="name" required value="{{Auth::user()->name}}" placeholder="Adınız Soyadınız"></div>
                                <div class="col-12 mb-20"><input class="form-control" type="email" name="email" value="{{Auth::user()->email}}" required placeholder="E-Posta Adresiniz"></div>
                                <div class="col-12 mb-20"><input class="form-control" type="password" name="password"  required placeholder="Yeni Şifreniz"></div>
                                <div class="col-12 mb-20"><input class="form-control" type="password" name="password_confirmation"  required placeholder="Yeni Şifre Tekrar"></div>

                                <div class="col-12 mt-10"><button type="submit" class="button button-primary button-outline">Güncelle</button></div>
                            </div>
                        </form>

                    </div>
                </div>
                </div>
            </div>

        </div><!-- Content Body End -->
     @endsection
