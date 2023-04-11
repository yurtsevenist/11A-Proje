



                <!-- Modal -->
                <div class="modal fade" id="userDelete">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Müşteri Sil</h5>
                                <button class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p>Seçmiş olduğunuz kullanıcı silinecektir onaylıyormusunuz!</p>
                            </div>
                            <div class="modal-footer">
                                <button class="button button-primary" data-dismiss="modal">Vazgeç</button>
                                 <form action="{{route('userDelete')}}" method="POST">
                                    @csrf
                                    <input type="hidden" id="id" name="id">
                                    <button class="button button-danger">Sil</button>
                                 </form>

                            </div>
                        </div>
                    </div>
                </div>




