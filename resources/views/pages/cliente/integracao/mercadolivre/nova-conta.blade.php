@extends('layouts.admin', ['title' => 'Autorização Mercado Livre'])

@section('content')
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white">
                        <div class="row align-items-center px-lg-4">
                            <h3 class="mb-0">Autorização Mercado Livre</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h3></h3>
                                <p>A vinculação de conta é necessária para que o Mercado Livre autorize a nossa plataforma
                                    a obter as informações de entregas das suas encomendas.</p>
                                <p>
                                    Você pode cancelar a autorização de sincronia a qualquer momento, por meio do painel da
                                    sua conta no Mercado Livre.
                                </p>
                                <p>
                                    Clique no botão abaixo para iniciar o processo de autorização de acesso.
                                </p>

                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <a class="btn btn-primary btn-block" href="{{ $urlIntegracao }}">Autorizar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @include('layouts.footers.auth')
    </div>

    <script src="/assets/js/components/busca-cep.js"></script>
@endsection
