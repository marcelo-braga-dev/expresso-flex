@extends('layouts.admin', ['title' => 'Editar Valores do Frete', 'menu_suspenso' => 'fretes'])

@section('content')
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Editar valores do frete</h4>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{url()->previous()}}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p>{{ get_dados_usuario($cliente['user_id'])->nome }}</p>
                <form method="post" action="{{ route('admin.fretes.atualiza-preco-clientes') }}">
                    @csrf @method('put')
                    <div class="row align-items-center">
                        <div class="col-md-auto mb-3">
                            <small class="d-block">
                                <label>São Paulo</label>
                                <div class="input-group mb-2" style="width: 10rem">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">R$</div>
                                    </div>
                                    <input type="text" class="form-control money pl-2 sp" name="sao_paulo"
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
                                    <input type="text" class="form-control money pl-2 gsp" name="grande_sao_paulo"
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

    @include('layouts.footers.auth')
    </div>
@endsection