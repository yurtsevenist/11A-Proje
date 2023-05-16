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
                                <h3 class="title">Müşteri Listesi: {{$users->count()}} adet kayıtlı müşteri bulundu</h3>
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
                                        <th>Yetki</th>
                                        <th>Sipariş Sayısı</th>
                                        <th>Toplam Harcama</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                              <tbody>
                                @php($sira=0)
                                  @foreach ($users as $user)
                                  @php($sira++)
                                    <tr>
                                        <td class="text-center">{{$sira}}</td>

                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>@if($user->who==0) Kullanıcı @else Yönetici @endif</td>
                                        <td>{{$user->getOrder->sum('number')}}</td>
                                        <td>${{$user->getOrder->sum('total')}}</td>
                                        <td class="text-center">
                                           <a class="edit-click btn btn-sm btn-primary" title="Güncelle" uid={{$user->id}} href="#"><i class="ti-pencil-alt"></i></a>
                                           <a class="delete-click btn btn-danger btn-sm text-white"  uid={{$user->id}} title="Müşteri Sil"><i class="ti-trash"></i></a>

                                      </td>
                                    </tr>
                                  @endforeach
                              </tbody>

                            </table>

                        </div>
                    </div>
                </div>
                <!--Export Data Table End-->
             </div>
             @include('userDeleteModal')
             @include('userEditModal')
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
            id = $(this)[0].getAttribute('uid');
           // console.log(id);
            // $('#id').val(id);
            $('#userEdit').modal();
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
