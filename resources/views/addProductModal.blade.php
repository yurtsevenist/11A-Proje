<!-- Modal -->
<div class="modal fade" id="addProduct">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ürün Ekle</h5>
                <button class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('productAdd')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-20">
                            <input class="form-control" type="text" required name="pname" placeholder="Ürün Adı">
                        </div>
                        <div class="col-12 mb-20">
                            <select name="category" required  class="form-control select2">
                                <option selected>Kategori Seçiniz</option>

                                    @foreach ($urunler->unique('category') as $urun )
                                    <option value="{{$urun->category}}">{{$urun->category}}</option>
                                    @endforeach

                            </select>
                        </div>
                        <div class="col-3 mb-20">
                            <input class="form-control" type="text" name="price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required placeholder="Ürün Fiyatı($)">
                        </div>
                        <div class="col-3 mb-20">
                            <input class="form-control" type="text" name="size"  required placeholder="Ürün Bedeni">
                        </div>
                        <div class="col-3 mb-20">
                            <input class="form-control" type="text" name="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required placeholder="Ürün Adedi">
                        </div>
                        <div class="col-3 mb-20">
                            <input class="form-control" type="text" name="color"  required placeholder="Ürün Rengi">
                        </div>
                        <div class=" col-12 mb-20 input-group">
                            <input type="file" class="form-control" required name="photo" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="button button-primary">Ekle</button>
                        <button class="button button-danger" data-dismiss="modal">Çıkış</button>



                    </div>
            </form>
        </div>
    </div>
</div>
