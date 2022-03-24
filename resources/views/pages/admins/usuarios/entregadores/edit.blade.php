<x-layout menu="usuarios" submenu="usuarios-entregadores">
    <div class="bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Editar Dados do Entregador</h4>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admins.usuarios.entregadores.update', $usuario->id) }}" autocomplete="off">
                    @csrf @method('put')

                    <div class="px-lg-4">
                        <h6 class="heading-small text-muted mb-4">Informações do Entregador</h6>
                    </div>

                    @if (!empty($mensagem))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $mensagem }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="px-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control form-control-alternative"
                                   value="@if (isset($usuario->name)){{ $usuario->name }}@endif" required autofocus>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="cpf">CPF</label>
                                    <input type="text" name="cpf" id="cpf" class="form-control form-control-alternative"
                                           value="@if (isset($dados['cpf'])){{ $dados['cpf'] }}@endif" required
                                           autofocus>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="celular">Celular</label>
                                    <input type="text" name="celular" id="celular"
                                           class="form-control form-control-alternative"
                                           value="@if (isset($dados['celular'])){{ $dados['celular'] }}@endif"
                                           required autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">E-mail</label>
                                    <input type="email" name="email" id="email"
                                           class="form-control form-control-alternative"
                                           value="@if (isset($usuario->email)){{ $usuario->email }}@endif"
                                           required autofocus>
                                </div>
                            </div>
                        </div>

                        {{-- Area Coleta --}}
                        <hr>
                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-control-label" for="input-name">Regiões de Coleta</label>
                            </div>
                            @if (empty($regioes['regiao_coleta']))
                                <div class="col-6 col-lg-2">
                                    <div class="form-group">
                                        <input type="number" name="regiao_coleta[]"
                                               class="form-control form-control-alternative"
                                               value="@if (isset($usuario->email)){{ $usuario->email }}@endif"
                                               autofocus>
                                    </div>
                                </div>
                            @else
                                @foreach ($regioes['regiao_coleta'] as $regiao)
                                    <div class="col-6 col-lg-2">
                                        <div class="form-group">
                                            <input type="number" name="regiao_coleta[]"
                                                   class="form-control form-control-alternative" value="{{ $regiao }}">
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <div class="col-auto pt-2">
                                <button class="btn btn-icon btn-success btn-sm rounded-circle" id="btn-add-regiao"
                                        type="button">
                                    <span class="btn-inner--icon"><i class="ni ni-fat-add"
                                                                     style="font-size: 16px"></i></span>
                                </button>
                            </div>
                        </div>

                        {{-- Area Entrega --}}
                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-control-label">Regiões de Entrega</label>
                            </div>
                            @if (empty($regioes['regiao_entrega']))
                                <div class="col-6 col-lg-2">
                                    <div class="form-group">
                                        <input type="number" name="regiao_entrega[]"
                                               class="form-control form-control-alternative" autofocus>
                                    </div>
                                </div>
                            @else
                                @foreach ($regioes['regiao_entrega'] as $regiao)
                                    <div class="col-6 col-lg-2">
                                        <div class="form-group">
                                            <input type="number" name="regiao_entrega[]"
                                                   class="form-control form-control-alternative" value="{{ $regiao }}"
                                                   autofocus>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <div class="col-auto pt-2">
                                <button class="btn btn-icon btn-success btn-sm rounded-circle"
                                        id="btn-add-regiao-entrega"
                                        type="button">
                                    <span class="btn-inner--icon"><i class="ni ni-fat-add"
                                                                     style="font-size: 16px"></i></span>
                                </button>
                            </div>

                        </div>
                        <hr>

                        <div class="form-group">
                            <label class="form-control-label" for="perfil">Perfil</label>
                            <textarea type="text" name="perfil" id="perfil" rows="5"
                                      class="form-control form-control-alternative"
                                      autofocus>@if (isset($dados['perfil'])){{ $dados['perfil'] }}@endif</textarea>
                        </div>

                        <div class="text-center">
                            <input type="hidden" name="tipo" value="entregador">
                            <input type="hidden" name="editar" value="true">
                            <input type="hidden" name="id" value="@if (isset($usuario->id)){{ $usuario->id }}@endif">
                            <button type="submit" class="btn btn-success mt-4">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @push('js')
            <script>
                $(function () {
                    $('#btn-add-regiao').click(function () {
                        var input =
                            `<div class="col-6 col-lg-2">
                            <div class="form-group">
                                <input class="form-control form-control-alternative" name="regiao_coleta[]" type="number">
                            </div>
                        </div>`;

                        $(this).parent().before(input);
                    });

                    $('#btn-add-regiao-entrega').click(function () {
                        var input =
                            `<div class="col-6 col-lg-2">
                            <div class="form-group">
                                <input class="form-control form-control-alternative" name="regiao_entrega[]" type="number">
                            </div>
                        </div>`;

                        $(this).parent().before(input);
                    });
                })
            </script>
        @endpush

    </div>
</x-layout>