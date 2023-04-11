



                <!-- Modal -->
                <div class="modal fade" id="userEdit">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Müşteri Düzenle</h5>
                                <button class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <form action="">
                            <div class="modal-body">

                                 @csrf
                                 <div class="row">
                                    <div class="col-12 mb-20"><input class="form-control" type="text" name="name" value="" placeholder="Adınız Soyadınız"></div>
                                    <div class="col-12 mb-20"><input class="form-control" type="email" name="email" value="" placeholder="E-Posta Adresiniz"></div>

                                    <div class="col-12 mb-20">
                                        <select class="form-control select2">
                                                <option>Kullanıcı</option>
                                                <option>Yönetici</option>
                                                <option>Hesabı Askıya Al</option>

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




