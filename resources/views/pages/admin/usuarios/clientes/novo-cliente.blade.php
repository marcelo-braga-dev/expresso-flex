<x-layout>

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Cadastro de Clientes</h4>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (!empty($mensagem))
                    <div class="alert alert-success">
                        {{ $mensagem }}
                    </div>
                @endif
                <form method="post"
                      action="@if (isset($usuario->id)){{ route('admin.usuarios.clientes.update') }}@else{{ route('admin.usuarios.clientes.create') }}@endif"
                      autocomplete="off">
                    @csrf
                    @method('put')

                    <div class="px-lg-4">
                        <h6 class="heading-small text-muted mb-4">Informações do Cliente</h6>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="px-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control form-control-alternative"
                                   value="@if (isset($usuario->nome)){{ $usuario->nome }}@endif" required autofocus>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">E-mail</label>
                                    <input type="email" name="email" id="email"
                                           class="form-control form-control-alternative"
                                           value="@if (isset($usuario->email)){{ $usuario->email }}@endif"
                                           required autofocus>
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

                        <hr>
                        <h6 class="heading-small text-muted mb-4">Preços dos Fretes</h6>

                        <div class="row">
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="sao_paulo">São Paulo</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="number" name="sao_paulo"
                                               value="@if (!empty($fretes['sao_paulo'])){{ $fretes['sao_paulo'] }}@endif"
                                               step="0.01"
                                               min="0.01" class="form-control" placeholder="0,00" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="grande_sao_paulo">Grande São Paulo</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="number" name="grande_sao_paulo"
                                               value="@if (!empty($fretes['grande_sao_paulo'])){{ $fretes['grande_sao_paulo'] }}@endif"
                                               step="0.01" min="0.01" class="form-control" placeholder="0,00" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h6 class="heading-small text-muted mb-4">Informações Empresariais</h6>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="cnpj">CNPJ</label>
                                    <input type="text" name="cnpj" id="cnpj"
                                           class="form-control form-control-alternative"
                                           value="@if (isset($dados['cnpj'])){{ $dados['cnpj'] }}@endif" autofocus>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="razao_social">Razão Social</label>
                                    <input type="text" name="razao_social" id="razao_social"
                                           class="form-control form-control-alternative"
                                           value="@if (isset($dados['razao_social'])){{ $dados['razao_social'] }}@endif"
                                           autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="nome_fantasia">Nome Fantasia</label>
                            <input type="text" name="nome_fantasia" id="nome_fantasia"
                                   class="form-control form-control-alternative"
                                   value="@if (isset($dados['nome_fantasia'])){{ $dados['nome_fantasia'] }}@endif"
                                   autofocus>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="nome_comercial">Nome do Representante
                                        Comercial</label>
                                    <input type="text" name="nome_comercial" id="nome_comercial"
                                           class="form-control form-control-alternative"
                                           value="@if (isset($dados['nome_comercial'])){{ $dados['nome_comercial'] }}@endif"
                                           autofocus>
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label class="form-control-label" for="email_comercial">
                                        E-mail do Representante Comercial
                                    </label>
                                    <input type="email" name="email_comercial" id="email_comercial"
                                           class="form-control form-control-alternative"
                                           value="@if (isset($dados['email_comercial'])){{ $dados['email_comercial'] }}@endif"
                                           autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="perfil">Perfil</label>
                                    <textarea type="text" name="perfil" id="perfil" rows="5"
                                              class="form-control form-control-alternative"
                                              autofocus>@if (isset($dados['perfil'])){{ $dados['perfil'] }}@endif</textarea>
                                </div>
                            </div>
                        </div>


                        <div class="text-center">
                            <input type="hidden" name="tipo" value="cliente">
                            <input type="hidden" name="editar"
                                   value="@if (isset($usuario->id)){{ $usuario->id }}@endif">
                            <input type="hidden" name="id" value="@if (isset($usuario->id)){{ $usuario->id }}@endif">
                            <button type="submit" class="btn btn-success mt-4">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</x-layout>
