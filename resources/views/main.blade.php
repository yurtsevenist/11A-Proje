     @extends('layouts.master')
     @section('content')
        <!-- Content Body Start -->
        <div class="content-body">
            <div class="row">
                <!-- Top Report Start -->
                <div class="col-xlg-3 col-md-6 col-12 mb-30">
                    <div class="top-report">

                        <!-- Head -->
                        <div class="head">
                            <h4>Toplam Kullancı Sayısı</h4>
                            <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content">
                            <h5>Müşteriler</h5>
                            <h2>{{$customers->where('who',0)->count()}}</h2>
                        </div>

                        <!-- Footer -->
                        <div class="footer">
                            @php($yuzdemusteri=round(($customers->where('who',0)->count()*100)/$customers->count(),1))
                            <div class="progess">
                                <div title="Müşteri yüzdesi %{{$yuzdemusteri}}" class="progess-bar" style="width:{{$yuzdemusteri}}%"></div>
                            </div>
                            <p>%{{$yuzdemusteri}} Müşteri</p>
                        </div>

                    </div>
                </div><!-- Top Report End -->

                <!-- Top Report Start -->
                <div class="col-xlg-3 col-md-6 col-12 mb-30">
                    <div class="top-report">

                        <!-- Head -->
                        <div class="head">
                            <h4>Toplam Ürün Sayısı</h4>
                            <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content">
                            <h5>Stoktaki Ürünler</h5>
                            <h2>{{$urunsayisi->where('number','>',0)->count()}}</h2>
                        </div>

                        <!-- Footer -->
                        <div class="footer">
                            @php($yuzdeurun=round(($urunsayisi->where('number','>',0)->count()*100)/$urunsayisi->count()))
                            <div class="progess">
                                <div class="progess-bar" style="width: {{$yuzdeurun}}%;"></div>
                            </div>
                            <p>%{{$yuzdeurun}} Stokta ürün</p>
                        </div>

                    </div>
                </div><!-- Top Report End -->

                <!-- Top Report Start -->
                <div class="col-xlg-3 col-md-6 col-12 mb-30">
                    <div class="top-report">

                        <!-- Head -->
                        <div class="head">
                            <h4>Sipariş Sayısı</h4>
                            <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content">
                            <h5>Tüm Zamanlar</h5>
                            <h2>{{$siparissayisi->where('status','!=',0)->count()}}</h2>
                        </div>

                        <!-- Footer -->
                        <div class="footer">
                            <div class="progess">
                                <div class="progess-bar" style="width: 88%;"></div>
                            </div>
                            <p>88% of unique visitor</p>
                        </div>

                    </div>
                </div><!-- Top Report End -->

                <!-- Top Report Start -->
                <div class="col-xlg-3 col-md-6 col-12 mb-30">
                    <div class="top-report">

                        <!-- Head -->
                        <div class="head">
                            <h4>Toplam Kazanç</h4>
                            <a href="#" class="view"><i class="zmdi zmdi-eye"></i></a>
                        </div>

                        <!-- Content -->
                        <div class="content">
                            <h5>Tüm Zamanlar</h5>
                            @php($toplamkazanc=0)
                            @foreach ($siparissayisi->where('status','!=',0) as $siparis )
                              @php($toplamkazanc+=($siparis->getProduct->buyprice*$siparis->number))
                            @endforeach
                            <h2>${{$toplamkazanc}}</h2>
                        </div>

                        <!-- Footer -->
                        <div class="footer">
                            <div class="progess">
                                <div class="progess-bar" style="width: 76%;"></div>
                            </div>
                            <p>76% of unique visitor</p>
                        </div>

                    </div>
                </div><!-- Top Report End -->
            </div>
        </div><!-- Content Body End -->
     @endsection
