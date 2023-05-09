<!-- Modal -->
<div class="modal fade" id="updateProduct">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ürün Güncelle</h5>
                <button class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('productAdd')}}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="pid" id="pid" value="0">
                        <div class="col-12 mb-20">
                            <input class="form-control" type="text" required name="pname" id="pname" placeholder="Ürün Adı">
                        </div>
                        <div class="col-12 mb-20">
                            <select name="category" id="category" required  class="form-control select2">
                                <option selected>Kategori Seçiniz</option>
                                    @foreach ($urunler->unique('category') as $urun )
                                    <option value="{{$urun->category}}">{{$urun->category}}</option>
                                    @endforeach

                            </select>
                        </div>
                        <div class="col-3 mb-20">
                            <input class="form-control" type="text" name="price" id="price" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required placeholder="Ürün Fiyatı($)">
                        </div>
                        <div class="col-3 mb-20">
                            <input class="form-control" type="text" name="size" id="size"  required placeholder="Ürün Bedeni">
                        </div>
                        <div class="col-3 mb-20">
                            <input class="form-control" type="text" name="number" id="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required placeholder="Ürün Adedi">
                        </div>
                        <div class="col-3 mb-20">
                            <input class="form-control" type="text" name="color" id="color" required placeholder="Ürün Rengi">
                        </div>
                        <div class=" col-12 mb-20 input-group">
                            <input type="file" class="form-control" required name="photo" id="photo" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="button button-primary">Güncelle</button>
                        <button class="button button-danger" data-dismiss="modal">Çıkış</button>



                    </div>
            </form>
        </div>
    </div>
</div>
