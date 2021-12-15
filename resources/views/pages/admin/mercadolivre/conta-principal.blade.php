@extends('layouts.admin', ['title' => 'Mercado Livre'])

@section('content')

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white">
                <div class="row align-items-center justify-content-between px-lg-4">
                    <h3 class="mb-0">Informações da Conta Principal do Mercado Livre</h3>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.mercadolivre.conta-sincronizada.update') }}"
                    autocomplete="off">
                    @csrf
                    @method('put')
                    <div class="px-lg-4">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">App ID</label>
                                    <input type="text" name="app_id" id="app_id"
                                        class="form-control form-control-alternative" value="{{ $dados['app_id'] }}"
                                        required autofocus>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">Client Secret</label>
                                    <input type="text" name="client_secret" id="input-name"
                                        class="form-control form-control-alternative"
                                        value="{{ $dados['client_secret'] }}" required autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">Url de Retorno da Autenticação (URI
                                        redirect)</label>
                                    <input type="text" name="url_retorno" id="url_retorno"
                                        class="form-control form-control-alternative" value="{{ $dados['url_retorno'] }}"
                                        required autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">URL de retornos de chamada de
                                        notificação</label>
                                    <input type="text" name="url_notificacao" id="url_notificacao"
                                        class="form-control form-control-alternative"
                                        value="{{ $dados['url_notificacao'] }}" required autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col-6">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
