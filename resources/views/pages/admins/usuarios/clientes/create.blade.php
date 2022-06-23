<x-layout menu="usuarios" submenu="usuarios-clientes">

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
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
                <form method="post"
                      action="{{ route('admins.usuarios.clientes.store') }}"
                      autocomplete="off">
                    @csrf

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
                                   value="" required autofocus>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">E-mail</label>
                                    <input type="email" name="email" id="email"
                                           class="form-control form-control-alternative"
                                           value=""
                                           required autofocus>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="celular">Celular</label>
                                    <input type="text" name="celular" id="celular"
                                           class="form-control form-control-alternative" autofocus>
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
                                               value=""
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
                                               value=""
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
                                           value="" autofocus>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="razao_social">Razão Social</label>
                                    <input type="text" name="razao_social" id="razao_social"
                                           class="form-control form-control-alternative"
                                           value=""
                                           autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="nome_fantasia">Nome Fantasia</label>
                            <input type="text" name="nome_fantasia" id="nome_fantasia"
                                   class="form-control form-control-alternative"
                                   value=""
                                   autofocus>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="nome_comercial">Nome do Representante
                                        Comercial</label>
                                    <input type="text" name="nome_comercial" id="nome_comercial"
                                           class="form-control form-control-alternative"
                                           value=""
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
                                           value=""
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
                                              autofocus></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</x-layout>
