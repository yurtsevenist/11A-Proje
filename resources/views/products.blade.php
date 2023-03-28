     @extends('layouts.master')
     @section('content')
        <!-- Content Body Start -->
        <div class="content-body">
             <div class="row">
                   <!--Export Data Table Start-->
                   <div class="col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h3 class="title">Ürün Listesi</h3>
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
                                           <a class="btn btn-sm btn-danger" title="Sil" href="#"><i class="ti-trash"></i></a>
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
        </div><!-- Content Body End -->
     @endsection
