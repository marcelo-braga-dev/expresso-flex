<x-layout menu="coletas" submenu="solicitacoes">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 px-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <small class="badge badge-info">Coleta de Pacotes <i class="fas fa-dolly"></i></small>
                        <h4 class="card-title text-uppercase mb-0">
                            Criar Solicitações de Coleta
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="row px-4">
                    <div class="col-12">
                        <p>
                            Selecione o cliente ou abra a câmera para ler o QrCode de identifição
                            do Ponto de Coleta do cliente.
                        </p>
                    </div>
                </div>

                <form method="POST" action="{{ route('entregadores.coletas.store') }}"> @csrf
                    <div class="row mb-4 px-4">
                        <div class="col-auto mx-auto">
                            <button type="submit" class="btn btn-success">Criar Coleta</button>
                        </div>
                    </div>
                    <div class="row mb-4 px-4 justify-content-end">
                        <div class="col-md-6">
                            <div class="form-group m-0">
                                <div class="input-group input-group-alternative input-group-merge bg-white">
                                    <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-search"></i>
                                </span>
                                    </div>
                                    <input type="text" class="form-control" id="search" placeholder="Pesquisar...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th class="col-auto p-0 m-0"></th>
                                <th class="">Cliente</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @foreach ($clientes as $index=>$item)
                                <tr>
                                    <td class="p-0 m-0">
                                        <div class="custom-control custom-radio">
                                            <div class="custom-control custom-radio mb-3">
                                                <input type="radio" id="customRadio{{$index}}" name="id"
                                                       value="{{ $item->id }}" class="custom-control-input" required>
                                                <label class="custom-control-label" for="customRadio{{$index}}"></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="white-text-normal">
                                        <label for="customRadio{{$index}}">
                                            <b>{{ get_nome_usuario($item->user_id) }}</b><br>
                                            [{{ $item->nome }}]
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-elements.camera-botao-flutuante
        operacao="{{ route('entregadores.qrcode.nova-coleta', ['entregador' => id_usuario_atual()]) }}"
        retorno="{{ route('entregadores.coletas.index') }}"></x-elements.camera-botao-flutuante>

</x-layout>
