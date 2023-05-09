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
                                <h3 class="title">Ürün Listesi</h3>
                            </div>
                            <div class="col-md-4 col-4 text-right">
                                <a class="btn btn-md btn-dark add-click" title="Ürün Ekle" href="#"><i class="ti-plus"></i></a>
                            </div>
                           </div>
                        </div>
                        <div class="box-body">

                            <table class="table table-bordered data-table data-table-export">
                                <thead>
                                    <tr>
                                        <th>Sıra</th>
                                        <th>Görsel</th>
                                        <th>Ürün Adı</th>
                                        <th>Ürün Kodu</th>
                                        <th>Kategori</th>
                                        <th>Fiyatı</th>
                                        <th>Adedi</th>
                                        <th>Renk</th>
                                        <th>Beden</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                              <tbody>
                                @php($sira=0)
                                  @foreach ($urunler as $urun)
                                  @php($sira++)
                                    <tr>
                                        <td class="text-center">{{$sira}}</td>
                                        <td><img src="{{$urun->photo}}" width="50px" alt="" srcset=""></td>
                                        <td>{{$urun->name}}</td>
                                        <td>{{$urun->code}}</td>
                                        <td>{{$urun->category}}</td>
                                        <td>{{$urun->price}}</td>
                                        <td>{{$urun->number}}</td>
                                        <td>{{$urun->color}}</td>
                                        <td>{{$urun->size}}</td>
                                        <td class="text-center">
                                           <a class="btn btn-sm btn-info" title="Görüntüle" href="#"><i class="ti-eye"></i></a>
                                           <a class="btn btn-sm btn-primary" title="Güncelle" href="#"><i class="ti-pencil-alt"></i></a>
                                           <a class="delete-click btn btn-danger btn-sm text-white"  pid={{$urun->id}} title="Ürünü Sil"><i class="ti-trash"></i></a>

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
             @include('productDeleteModal')
             @include('addProductModal')
        </div><!-- Content Body End -->


     @endsection
    @section('css')

    @endsection
    @section('js')
     {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>  --}}

    <script>
        $(function(){
           $('.delete-click').click(function(){
            id = $(this)[0].getAttribute('pid');
           // console.log(id);
            $('#id').val(id);
            $('#productDelete').modal();
           });
        });
 </script>
 <script>
    $(function(){
       $('.add-click').click(function(){
        $('#addProduct').modal();
       });
    });
</script>
    @endsection
