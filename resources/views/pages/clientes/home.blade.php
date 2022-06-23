<x-layout>

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--8 mb-6">
        <div class="row">
            <div class="col-md-6 mb-5">
                <div class="card mb-3 p-4 pb-1">
                    <form action="{{ route('clientes.pacotes.pesquisar.show') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <div class="form-group m-0">
                                    <label class="form-control-label" for="input-name">Pesquisar Pacote</label>
                                    <input type="text" name="id"
                                        class="form-control form-control-alternative" value="" placeholder="EF0000SP"
                                        required autofocus>
                                </div>
                            </div>
                            <div class="col-md-3 align-self-end text-right mb-3">
                                <button type="submit" class="btn btn-primary">Pesquisar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>

        <div class="row">
            {{-- Gerar Etiqueta --}}
            <div class="col-md-6 mb-3">
                <div class="card card-stats shadow">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">
                                    Etiqueta
                                </h5>
                                <span class="h2 font-weight-bold mb-0">
                                    Gerar Etiqueta Expresso Flex
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-file"></i>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-danger" href="{{ route('clientes.etiquetas.expressoflex.create') }}">
                            Gerar Etiqueta
                        </a>
                    </div>
                </div>
            </div>

            {{-- QRCode Pontos de Coletas --}}
            <div class="col-md-6 mb-3">
                <div class="card card-stats shadow">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">
                                    Pontos de Coletas
                                </h5>
                                <span class="h2 font-weight-bold mb-0">
                                    Ver QrCode de Identificação dos Pontos de Coletas
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-dark text-white rounded-circle shadow">
                                    <i class="fas fa-qrcode"></i>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-dark" href="{{ route('clientes.lojas.qrcode') }}">
                            QrCode do Pondo de Coleta
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- Faturamento --}}
            <div class="col-md-6 mb-3">
                <div class="card card-stats shadow">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">
                                    Financeiro
                                </h5>
                                <span class="h2 font-weight-bold mb-0">
                                    Ver Faturamento do Mês
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-success" href="{{ route('clientes.financeiro.index') }}">
                            Ver Faturamento
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-layout>
