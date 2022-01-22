<x-layout>

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Cadastro de Clientes</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('cliente.perfil.update') }}" autocomplete="off">
                    @csrf @method('put')

                    <div class="px-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="nome">Seu Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control form-control-alternative"
                                value="@if (isset($user['nome'])){{ $user['nome'] }}@endif" required autofocus>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">E-mail</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control form-control-alternative" value="@if (isset($user['email'])){{ $user['email'] }}@endif"
                                        required autofocus>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="celular">Celular</label>
                                    <input type="text" name="celular" id="celular"
                                        class="form-control form-control-alternative" value="@if (isset($user['celular'])){{ $user['celular'] }}@endif"
                                        required autofocus>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h6 class="heading-small text-muted mb-4">Informações Empresariais</h6>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="cnpj">CNPJ</label>
                                    <input type="text" name="cnpj" id="cnpj" class="form-control form-control-alternative"
                                        value="@if (isset($user['cnpj'])){{ $user['cnpj'] }}@endif" autofocus>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="razao_social">Razão Social</label>
                                    <input type="text" name="razao_social" id="razao_social"
                                        class="form-control form-control-alternative" value="@if (isset($user['razao_social'])){{ $user['razao_social'] }}@endif"
                                        autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="nome_fantasia">Nome Fantasia</label>
                            <input type="text" name="nome_fantasia" id="nome_fantasia"
                                class="form-control form-control-alternative" value="@if (isset($user['nome_fantasia'])){{ $user['nome_fantasia'] }}@endif" autofocus>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="nome_comercial">Nome do Representante
                                        Comercial</label>
                                    <input type="text" name="nome_comercial" id="nome_comercial"
                                        class="form-control form-control-alternative" value="@if (isset($user['nome_comercial'])){{ $user['nome_comercial'] }}@endif"
                                        autofocus>
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label class="form-control-label" for="email_comercial">
                                        E-mail do Representante Comercial
                                    </label>
                                    <input type="email" name="email_comercial" id="email_comercial"
                                        class="form-control form-control-alternative" value="@if (isset($user['email_comercial'])){{ $user['email_comercial'] }}@endif"
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
                                        autofocus>@if (isset($user['perfil'])){{ $user['perfil'] }}@endif</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="hidden" name="tipo" value="cliente">
                            <input type="hidden" name="editar" value="@if (isset($user['id'])){{ $user['id'] }}@endif">
                            <input type="hidden" name="id" value="@if (isset($user['id'])){{ $user['id'] }}@endif">
                            <button type="submit" class="btn btn-success mt-4">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
    </x-layout>
