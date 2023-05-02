



                <!-- Modal -->
                <div class="modal fade" id="orderEdit">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Sipariş Düzenle</h5>
                                <button class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <form action="{{route('orderUpdate')}}" method="POST">
                            <div class="modal-body">
                                 @csrf
                                 <div class="row">
                                    <div class="col-12 mb-20"><input class="form-control" type="text" name="pname" id="pname" value="" placeholder="Ürün Adı"></div>
                                    <input type="hidden" name="id" id="id" >
                                    <div class="col-12 mb-20">
                                        <select name="status" id="status" class="form-control select2">
                                                <option value="0">Spariş İptal Edildi</option>
                                                <option value="1">Sipariş Verildi</option>
                                                <option value="2">Sipariş Onaylandı</option>
                                                <option value="3">Sipariş Kargoya Verildi</option>
                                                <option value="4">Sipariş Teslim Edildi</option>
                                                <option value="5">Sipariş İade Edildi</option>
                                        </select>
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




