     @extends('layouts.master')
     @section('content')
        <!-- Content Body Start -->
        <div class="content-body">
             <div class="row">
                   <!--Export Data Table Start-->
                   <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                           <div class="row">
                            <div class="col-md-8 col-8">
                                <h3 class="title">Sipariş Listesi:  adet kayıtlı sipariş bulundu</h3>
                            </div>
                            <div class="col-md-4 col-4 text-right">
                                <a class="btn btn-md btn-dark" title="Ürün Ekle" href="#"><i class="ti-plus"></i></a>
                            </div>
                           </div>
                        </div>
                        <div class="box-body">

                            <table class="table table-bordered data-table data-table-export">
                                <thead>
                                    <tr>
                                        <th>Sıra</th>
                                        <th>Adı Soyadı</th>
                                        <th>E-Posta Adresi</th>
                                        <th>Ürün Adı</th>
                                        <th>Alış Fiyatı</th>
                                        <th>Satış Fiyatı</th>
                                        <th>KDV</th>
                                        <th>Adet</th>
                                        <th>Kargo Bedeli</th>
                                        <th>Toplam Fiyat</th>
                                        <th>Toplam KDV</th>
                                        <th>Toplam Kazanç</th>
                                        <th>Tarih</th>
                                        <th>Durumu</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                              <tbody>
                                @php($sira=0)
                                @php($toplam=0)
                                @foreach ($orders as $order )
                                @php($sira++)
                                @php($toplam+=($order->number*$order->getProduct->buyprice)-(($order->number*$order->getProduct->price)*$order->getProduct->tax))
                                    <tr>
                                        <td>{{$sira}}</td>
                                        <td>{{$order->getUser->name}}</td>
                                        <td>{{$order->getUser->email}}</td>
                                        <td>{{$order->getProduct->name}}</td>
                                        <td>${{$order->getProduct->buyprice}}</td>
                                        <td>${{$order->getProduct->price}}</td>
                                        <td>%{{$order->getProduct->tax*100}}</td>
                                        <td>{{$order->number}}</td>
                                        <td>@if($order->cargo==0) Kargo Bedeli Yok @else ${{$order->cargo}} @endif</td>
                                        <td>${{($order->number*$order->getProduct->price)+$order->cargo}}</td>
                                        <td>${{($order->number*$order->getProduct->price)*$order->getProduct->tax}}</td>
                                        <td>${{($order->number*$order->getProduct->buyprice)-(($order->number*$order->getProduct->price)*$order->getProduct->tax)}}</td>


                                        <td>{{Carbon\Carbon::parse($order->date)->format('d.m.Y')}}</td>
                                        <td>
                                            @if($order->status==1)
                                             Sipariş
                                            @elseif($order->status==2)
                                             Onaylandı
                                            @elseif($order->status==3)
                                             Kargoya Verildi
                                            @elseif($order->status==4)
                                            Teslim Edildi
                                            @elseif($order->status==5)
                                            İade
                                            @else
                                            İptal
                                            @endif
                                        </td>

                                            <td class="text-center">
                                                <a class="btn btn-sm btn-info" title="Görüntüle" href="#"><i class="ti-eye"></i></a>
                                                <a class="btn btn-sm btn-primary edit-click" status={{$order->status}} pname={{$order->getProduct->name}} pid={{$order->id}} title="Güncelle" href="#"><i class="ti-pencil-alt"></i></a>
                                                <a class="delete-click btn btn-danger btn-sm text-white"  pid={{$order->id}} title="Siparişi Sil"><i class="ti-trash"></i></a>

                                           </td>

                                    </tr>
                                @endforeach
                              </tbody>

                            </table>

                        </div>
                        <div class="row">
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-4 text-center fw-bold fs-2">
                              <h4><b>Toplam Kazanç :</b> ${{round($toplam,2)}}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Export Data Table End-->
             </div>
             {{-- @include('userDeleteModal')--}}
             @include('orderEditModal')
        </div><!-- Content Body End -->


     @endsection
    @section('css')

    @endsection
    @section('js')


    <script>
        $(function(){
           $('.delete-click').click(function(){
            id = $(this)[0].getAttribute('uid');
           // console.log(id);
            $('#id').val(id);
            $('#userDelete').modal();
           });
        });
 </script>



    <script>
        $(function(){
           $('.edit-click').click(function(){
            id = $(this)[0].getAttribute('pid');
            pname = $(this)[0].getAttribute('pname');
            status = $(this)[0].getAttribute('status');
           // console.log(id);
             $('#pname').val(pname);
             $('#id').val(id);
             $('#status').val(status);
             $('#status').trigger('change');
            $('#orderEdit').modal();
           });
        });
 </script>
<!-- Plugins & Activation JS For Only This Page -->
<script src="{{asset('admintema')}}/assets/js/plugins/select2/select2.full.min.js"></script>
<script src="{{asset('admintema')}}/assets/js/plugins/select2/select2.active.js"></script>
<script src="{{asset('admintema')}}/assets/js/plugins/nice-select/jquery.nice-select.min.js"></script>
<script src="{{asset('admintema')}}/assets/js/plugins/nice-select/niceSelect.active.js"></script>
<script src="{{asset('admintema')}}/assets/js/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="{{asset('admintema')}}/assets/js/plugins/bootstrap-select/bootstrapSelect.active.js"></script>
 @endsection
