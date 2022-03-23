<x-layout>

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white">
                <div class="row justify-content-between align-items-center px-3">
                    <div>
                        <h3 class="mb-0">Contas Mercado Livre Sincronizadas</h3>
                    </div>
                    <div>
                        <div class="form-group m-0">
                            <div class="input-group">
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
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort">CLiente</th>
                            <th scope="col" class="sort">Contas Mercado Livre</th>
                            <th scope="col" class="sort">Data da Sincronia</th>
                        </tr>
                        </thead>
                        <tbody class="list bg-white">
                        @foreach ($contas as $conta)
                            <tr>
                                <td>
                                    <b>{{ get_dados_usuario($conta['user_id'])->name }}</b><br>
                                    Id: #{{ $conta['user_id'] }}
                                </td>
                                <td>
                                    @foreach ($conta['contas'] as $info)
                                        {{ $info['nickname'] }}
                                        [#{{ $info['seller_id'] }}]<br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($conta['contas'] as $created_at)
                                        {{ $created_at['created_at'] }} <br>
                                        {{-- <a href="/">
                                            <small class="text-danger">Deletar</small>
                                        </a> --}}
                                    @endforeach
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
