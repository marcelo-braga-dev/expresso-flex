<x-layout>

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-1">
                            Seus Pontos de Coleta
                        </h4>
                        @if (!count($lojas))
                            <a class="btn btn-primary" href="{{ route('cliente.coleta.novo-pontos-de-coleta') }}">
                                Novo Ponto de Coleta
                            </a>
                        @endif
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-store"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-2">
                <div class="row">
                    <div class="col-12">
                        @foreach ($lojas as $loja)
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="d-block">
                                            {{ $loja['nome'] }}
                                        </span>
                                        <span class="d-block">
                                            <small>Endereço:
                                                {{ get_endereco($loja['endereco']) }}
                                            </small>
                                        </span>
                                    </div>
                                    <div>
                                        <div class="dropdown">
                                            <a class="btn border btn-sm btn-icon-only text-dark" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <form method="POST" id="{{ $loja['id'] }}"
                                                    action="{{ route('cliente.coleta.pontos-de-coleta.desativar') }}">
                                                    @csrf @method('put')
                                                    <input type="hidden" name="id" value="{{ $loja['id'] }}">
                                                    <button type="submit" class="dropdown-item btn-excluir"
                                                        value="{{ $loja['id'] }}">
                                                        Excluir
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach

                        @if (!count($lojas))
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <span class="d-block">
                                        Você não possui nenhum ponto de coleta
                                        cadastrado.
                                    </span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalConfirDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Excluir Ponto de Coleta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja excluir esse ponto de coleta?
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="id_no_modal">
                    <button type="button" class="btn btn-danger btn-modal-excluir">Excuir</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('.btn-excluir').click(function(e) {
                e.preventDefault();

                $('#id_no_modal').val($(this).val());
                $('#modalConfirDelete').modal('show');
            });

            $('.btn-modal-excluir').click(function(e) {
                var id_excluir = $('#id_no_modal').val();
                $('#' + id_excluir).submit();
            });
        });
    </script>
    </x-layout>
