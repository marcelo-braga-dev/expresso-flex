<x-layout menu="usuarios" submenu="usuarios-entregadores">
    <div class="bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Cadastro de Entregador</h4>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data"
                      action="{{ route('admins.usuarios.entregadores.store') }}" autocomplete="off"> @csrf
                    <div class="px-lg-4">
                        <h6 class="heading-small text-muted mb-4">Informações do Entregador</h6>
                    </div>

                    <div class="px-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control form-control-alternative"
                                   required autofocus>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="cpf">CPF</label>
                                    <input type="text" name="cpf" id="cpf"
                                           class="form-control form-control-alternative">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="cnpj">CNPJ</label>
                                    <input type="text" name="cnpj" id="cnpj"
                                           class="form-control form-control-alternative">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="celular">Celular</label>
                                    <input type="text" name="celular" id="celular"
                                           class="form-control form-control-alternative">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">E-mail</label>
                                    <input type="email" name="email" id="email"
                                           class="form-control form-control-alternative"
                                           required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="form-control-label" for="endereco">Endereço</label>
                                <input type="text" name="endereco" id="endereco"
                                       class="form-control form-control-alternative">
                            </div>
                        </div>


                        <hr>
                        <h6 class="heading-small text-muted mb-4">Valores das Comissões</h6>

                        <div class="row">
                            <div class="col-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="sao_paulo">São Paulo</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="number" name="sao_paulo"
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
                                               step="0.01" min="0.01" class="form-control" placeholder="0,00" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col">
                                <label class="form-control-label" for="img_cnh">Foto da CNH</label>
                                <input type="file" class="form-control" name="img_cnh">
                            </div>
                            <div class="col">
                                <label class="form-control-label" for="img_documento_veiculo">Foto do Documento do
                                    Veículo</label>
                                <input type="file" class="form-control" name="img_documento_veiculo">
                            </div>
                        </div>
                        <div class="text-center pt-3">
                            <button type="submit" class="btn btn-success mt-4">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
