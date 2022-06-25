<x-layout menu="importacao" submenu="mercado-livre">
    <div class="header bg-principal bg-height-top"></div>
    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <h4 class="card-title text-uppercase mb-1">Importar etiquetas Mercado Livre</h4>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ route('clientes.importacoes.pacotes.index') }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0 bg-white">
                <div class="table-responsive">
                    <table class="table align-items-center">
                        <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th scope="col">Destinatario</th>
                            <th scope="col">Entrega</th>
                            <th scope="col">Endereço</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dados as $item)
                            <tr @if(!$item['importar']) class="text-red" @endif>
                                <td class="text-center">
                                    @if($item['importar'] && empty($item['existe']))
                                        <i class="fas fa-check text-success"></i>
                                    @else
                                        <i class="fas fa-times text-red"></i>
                                    @endif
                                </td>
                                <td class="white-text-normal">
                                    @if (!empty($item['existe']))
                                        <span class="text-red d-block mb-2"><b>Já Importado</b></span>
                                    @elseif(!$item['importar'])
                                        <span class="text-red d-block mb-2"><b>Não Importado</b></span>
                                    @else
                                        <span class="text-success d-block mb-2"><b>Importado</b></span>
                                    @endif
                                    <b>Nome:</b> {{ $item['destinatario']['nome'] }}<br>
                                    <b>Documento:</b> {{ $item['destinatario']['documento'] }}<br>
                                </td>
                                <td>
                                    <b>Rastreio:</b> {{ $item['rastreio'] }}<br>
                                    <b>Status</b>: {{ $item['status'] }}<br>
                                    <b>Tipo:</b> {{ $item['metodo_entrega'] }}
                                </td>
                                <td class="white-text-normal">
                                    {{ $item['endereco']['endereco'] }}<br>
                                    Cep: {{ formatar_cep($item['endereco']['cep']) }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>



