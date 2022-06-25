<x-layout menu="lojas" submenu="pontos">

    <div class="header bg-principal bg-height-top"></div>

    <!-- Nova Loja -->
    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card mb-4">
            <!-- Card header -->
            <div class="card-header border">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Cadastrar Ponto de Coleta</h3>
                    <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}">Voltar</a>
                </div>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('clientes.lojas.store') }}" autocomplete="off">
                    @csrf

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
                        <div class="col-lg-2">
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
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="cidade">Cidade</label>
                                <input type="text" name="endereco[cidade]" id="cidade"
                                       class="form-control form-control-alternative" required autofocus>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="estado">Estado</label>
                                <input type="text" name="endereco[estado]" id="estado"
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
    @push('js')
        <script src="{{ asset('assets') }}/js/components/busca-cep.js?ver=1.0.0"></script>
    @endpush
</x-layout>
