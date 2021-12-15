@if (!empty(session('erro')))
<!-- Erro -->
<div class="modal fade" id="modalSession" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
                <div class="modal-body pb-0">
                    <div class="row justify-content-center">
                        <div class="col-auto mb-3">
                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow p-0">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <span class="text-danger">{{ session('erro') }}</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secundary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#modalSession').modal('show');
        })
        </script>
@endif

@if (!empty(session('sucesso')))
<!-- Sucesso -->
    <div class="modal fade" id="modalSession" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body pb-0">
                    <div class="row justify-content-center">
                        <div class="col-auto mb-3">
                            <div class="icon icon-shape bg-success text-white rounded-circle shadow p-0">
                                <i class="fas fa-check"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <span>{{ session('sucesso') }}</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secundary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#modalSession').modal('show');
        })
    </script>
@endif