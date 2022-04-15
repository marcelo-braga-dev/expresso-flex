<x-layout menu="financeiro" submenu="financeiro-mercadopago">

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white">
                <div class="row align-items-center justify-content-between px-lg-4">
                    <h3 class="mb-0">Informações da Conta Principal do Mercado Livre</h3>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admins.integracoes.admins.mercadopago.store') }}"
                      autocomplete="off">
                    @csrf
                    @method('put')
                    <div class="px-lg-4">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="public_key">Public Key</label>
                                    <input type="text" name="public_key" id="public_key"
                                           class="form-control form-control-alternative"
                                           value="{{ $public_key }}"
                                           required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="private_key">Private Key</label>
                                    <input type="text" name="private_key" id="private_key"
                                           class="form-control form-control-alternative"
                                           value="{{ $private_key }}"
                                           required autofocus>
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
