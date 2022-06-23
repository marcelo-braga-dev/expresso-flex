<x-layout menu="integracoes" submenu="integracoes-mercadolivre-expressoflex">

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white">
                <div class="row align-items-center justify-content-between px-lg-4">
                    <h3 class="mb-0">Informações da Conta Principal do Mercado Livre</h3>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admins.integracoes.admins.mercadolivre.store') }}"
                      autocomplete="off">
                    @csrf
                    <div class="px-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">App ID</label>
                                    <input type="text" name="app_id" id="app_id"
                                           class="form-control form-control-alternative" value="{{ $appId }}"
                                           required autofocus>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">Client Secret</label>
                                    <input type="text" name="client_secret" id="input-name"
                                           class="form-control form-control-alternative"
                                           value="{{ $clientSecret }}" required autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">Url de Retorno da Autenticação
                                        (URI
                                        redirect)</label>
                                    <input type="text" name="url_retorno" id="url_retorno"
                                           class="form-control form-control-alternative"
                                           value="{{ $urlRetorno }}"
                                           required autofocus readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">URL de retornos de chamada de
                                        notificação</label>
                                    <input type="text" name="url_notificacao" id="url_notificacao"
                                           class="form-control form-control-alternative"
                                           value="{{ $urlNotificacao }}"
                                           required autofocus readonly>
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


    </div>
</x-layout>
