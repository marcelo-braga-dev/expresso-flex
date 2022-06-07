<x-layout menu="importacao" submenu="mercado-livre">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-1">Importar Pacotes para Entrega do Mercado Livre</h4>
                    </div>
                </div>
            </div>
            <div class="card-body p-0 bg-white">
                <div class="row p-3 mb-4">
                    <div class="col-12 mx-auto">
                        <h3 class="text-center p-2">
                            Verifique os pacotes a serem importados e clique no botão
                            abaixo para continuar com o processo:
                        </h3>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-auto">
                            <form method="POST" action="{{ route('clientes.importacoes.mercadolivre.store') }}"> @csrf
                                <input type="hidden" name="dados" value='@json($dados)'>
                                <input type="hidden" name="loja" value='{{ $loja }}'>
                                <button type="submit" class="btn btn-success">Continuar</button>
                            </form>

                        </div>

                    </div>
                </div>

                <div class="table-responsive">
                    <div>
                        <table class="table align-items-center">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Destinatario</th>
                                <th scope="col">Entrega</th>
                                <th scope="col">Endereço</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($dados as $item)
                                <tr>
                                    <td>
                                        <b>Nome:</b> {{ $item['destinatario']['nome'] }}<br>
                                        <b>Documento:</b> {{ $item['destinatario']['documento'] }}<br>
                                    </td>
                                    <td>
                                        <b>Código:</b> {{ $item['codigo'] }}<br>
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
    </div>
</x-layout>



