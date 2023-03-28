



                <!-- Modal -->
                <div class="modal fade" id="productDelete">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ürün Sil</h5>
                                <button class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p>Seçmiş olduğunuz ürün silinecektir onaylıyormusunuz!</p>
                            </div>
                            <div class="modal-footer">
                                <button class="button button-primary" data-dismiss="modal">Vazgeç</button>
                                 <form action="{{route('productDelete')}}" method="POST">
                                    @csrf
                                    <input type="hidden" id="id" name="id">
                                    <button class="button button-danger">Sil</button>
                                 </form>

                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(function(){
                       $('.delete-click').click(function(){
                        id = $(this)[0].getAttribute('pid');
                       // console.log(id);
                        $('#id').val(id);
                        $('#productDelete').modal('show');
                       });
                    });
             </script>



