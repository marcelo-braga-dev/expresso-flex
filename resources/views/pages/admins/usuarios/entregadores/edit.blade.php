<x-layout menu="usuarios" submenu="usuarios-entregadores">
    <div class="bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
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
                <form method="post" enctype="multipart/form-data" action="{{ route('admins.usuarios.entregadores.update', $usuario->id) }}"
                      autocomplete="off">
                    @csrf @method('put')

                    <div class="px-lg-4">
                        <h6 class="heading-small text-muted mb-4">Informações do Entregador</h6>
                    </div>

                    <div class="px-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control form-control-alternative"
                                   value="{{ $usuario->name ?? '' }}" required autofocus>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="cpf">CPF</label>
                                    <input type="text" name="cpf" id="cpf" class="form-control form-control-alternative"
                                           value="{{ $dados['cpf'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="cpf">CNPJ</label>
                                    <input type="text" name="cnpj" id="cnpj"
                                           class="form-control form-control-alternative"
                                           value="{{ $dados['cnpj'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="celular">Celular</label>
                                    <input type="text" name="celular" id="celular"
                                           class="form-control form-control-alternative"
                                           value="{{ $dados['celular'] ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">E-mail</label>
                                    <input type="email" name="email" id="email"
                                           class="form-control form-control-alternative"
                                           value="{{ $usuario->email ?? '' }}"
                                           required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="endereco">Endereço</label>
                                    <input type="text" name="endereco" id="endereco"
                                           class="form-control form-control-alternative"
                                           value="{{ $dados['endereco'] ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-control-label" for="img_cnh">Foto da CNH</label>
                                @if (!empty($dados['img_cnh']))
                                    <img class="img-thumbnail d-block"
                                         src="{{ asset('storage/'.$dados['img_cnh'] ?? '') }}">
                                @endif
                                <input type="file" class="form-control" name="img_cnh">
                            </div>
                            <div class="col-md-6">
                                <label class="form-control-label" for="img_documento_veiculo">
                                    Foto do Documento do Veículo</label>
                                @if (!empty($dados['img_documento_veiculo']))
                                    <img class="img-thumbnail d-block"
                                         src="{{ asset('storage/' . $dados['img_documento_veiculo'] ?? '') }}">
                                @endif
                                <input type="file" class="form-control" name="img_documento_veiculo">
                            </div>
                        </div>
                        <hr>

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
    </div>
</x-layout>
