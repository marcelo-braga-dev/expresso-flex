@extends('layouts.admin', ['title' => 'Todos Clientes'])

@section('content')

    <div class="header bg-principal bg-height-top">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center pt-4">
                    <div class="col-lg-6 col-5">
                        <a class="btn btn-white btn-nova-loja">
                            Novo Ponto de Coleta
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Nova Loja -->
    <div class="container-fluid mt--7 mb-9" id="div-nova-loja" style="display: none">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white">
                <div class="row align-items-center px-lg-4">
                    <h3 class="mb-0 text-primario">Informações do Ponto de Coleta</h3>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('cliente.coleta.pontos-de-coleta.put') }}" autocomplete="off">
                    @csrf @method('put')

                    @include('layouts.componentes.alerts')

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nome">Nome para Identificação</label>
                                <input type="text" name="nome" id="nome" class="form-control form-control-alternative"
                                    placeholder="Ex: Loja de Roupa do Centro" required autofocus>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="celular">Telefone/Celular</label>
                                <input type="text" name="celular" id="celular" class="form-control form-control-alternative"
                                    placeholder="(00) 0 0000-0000" required autofocus>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="form-control-label" for="cep">Cep</label>
                                <input type="text" name="endereco[cep]" id="cep"
                                    class="form-control cep form-control-alternative" minlength="9" placeholder="00000-000"
                                    required autofocus>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label class="form-control-label" for="rua">Rua/Avenida</label>
                                <input type="text" name="endereco[rua]" id="rua"
                                    class="form-control form-control-alternative" required autofocus>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="numero">Número</label>
                                <input type="text" name="endereco[numero]" id="numero"
                                    class="form-control form-control-alternative" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="complemento">Complemento</label>
                                <input type="text" name="endereco[complemento]" id="complemento"
                                    class="form-control form-control-alternative" autofocus>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="bairro">Bairro</label>
                                <input type="text" name="endereco[bairro]" id="bairro"
                                    class="form-control form-control-alternative" required autofocus>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="form-control-label" for="cidade">Cidade</label>
                                <input type="text" name="endereco[cidade]" id="cidade"
                                    class="form-control form-control-alternative" required autofocus>
                            </div>
                        </div>
                        <div class="col-lg-5 mx-auto">
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">
                            Seus Pontos de Coleta
                        </h4>
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
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <button class="btn btn-primary btn-nova-loja my-3">
                                        Novo Ponto de Coleta
                                    </button>
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

    <script>
        $(function() {
            $('.btn-nova-loja').click(function() {
                $('#div-nova-loja').toggle(800);
            });
        })
    </script>
    <script src="/assets/js/components/busca-cep.js"></script>
@endsection
