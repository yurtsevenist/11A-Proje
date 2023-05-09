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
                                <a class="btn btn-md btn-dark add-click" pid=0 title="Ürün Ekle" href="#"><i class="ti-plus"></i></a>
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
                                           <a class="btn btn-sm btn-primary update-click"
                                            pid={{$urun->id}} pname={{$urun->name}} category={{$urun->category}} price={{$urun->price}}
                                            number={{$urun->number}} size={{$urun->size}} color={{$urun->color}}
                                           title="Güncelle"><i class="ti-pencil-alt"></i></a>
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
             {{-- @include('addProductModal') --}}
             @include('productDeleteModal')
             @include('updateProductModal')

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
        id=$(this)[0].getAttribute('pid');
        $('#pid').val(id);
        $('#modal-title').text("Ürün Ekle");
         $('#modal-button').text("Ekle");
        $('#updateProduct').modal();
       });
    });
</script>
<script>
    $(function(){
       $('.update-click').click(function(){
        id=$(this)[0].getAttribute('pid');
        if(id!=0)
        {
            $('#modal-title').text("Ürün Güncelle");
            $('#modal-button').text("Güncelle");

        }
        else
        {
            $('#modal-title').text("Ürün Ekle");
            $('#modal-button').text("Ekle");
        }
        $('#pid').val(id);
        $('#pname').val($(this)[0].getAttribute('pname'));
        $('#size').val($(this)[0].getAttribute('size'));
        $('#color').val($(this)[0].getAttribute('color'));
        $('#number').val($(this)[0].getAttribute('number'));
        $('#price').val($(this)[0].getAttribute('price'));
        $('#category').val($(this)[0].getAttribute('category'));
        $('#category').trigger('change');
        $('#updateProduct').modal();
       });
    });
</script>
    @endsection
