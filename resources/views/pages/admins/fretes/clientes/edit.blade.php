<x-layout>
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Editar valores do frete</h4>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h4 class="mb-4">{{ get_dados_usuario($cliente['user_id'])->name }}</h4>
                <form method="post" action="{{ route('admins.fretes.clientes.update', $id) }}">
                    @csrf @method('put')
                    <div class="row align-items-center">
                        <div class="col-md-auto mb-3">
                            <small class="d-block">
                                <label>São Paulo</label>
                                <div class="input-group mb-2" style="width: 10rem">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">R$</div>
                                    </div>
                                    <input type="number" step="0.01" class="form-control pl-2" name="sao_paulo"
                                           style="width: 20px" value="{{ $cliente['sao_paulo'] }}">
                                </div>
                            </small>
                        </div>
                        <div class="col-md-auto mb-3">
                            <small class="d-block">
                                <label>Grande São Paulo</label>
                                <div class="input-group mb-2" style="width: 10rem">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">R$</div>
                                    </div>
                                    <input type="number" step="0.01" class="form-control pl-2" name="grande_sao_paulo"
                                           value="{{ $cliente['grande_sao_paulo'] }}">
                                </div>
                            </small>
                        </div>
                        <div class="col-md-auto">
                            <input type="hidden" name="id" value="{{ $cliente['user_id'] }}">
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
