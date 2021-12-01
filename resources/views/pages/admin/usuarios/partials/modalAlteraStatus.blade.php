<!-- Modal -->
<div class="modal fade" id="modalMudarStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Mudança de Status de Acesso do Usuário
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Status de acesso do usuário <b><span id="modal-nome-usuario"></span></b> atualizado com sucesso.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('.status-usuario').change(function() {

            var id = $(this).val();
            var status = $(this).is(':checked');

            $.ajax({
                type: "GET",
                url: '{{ route('ajax.admin.usuario.atualiza-status-usuario') }}',
                data: {
                    'id': id,
                    'value': status
                },
                success: function(result) {
                    $('#modal-nome-usuario').text(result)
                    $('#modalMudarStatus').modal('show');
                }
            });
        });
    })
</script>
