<x-layout menu="integracoes" submenu="integracoes-mercadolivre">

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
                            <th scope="col">CLiente</th>
                            <th scope="col">Contas Mercado Livre</th>
                            <th scope="col">Sincronia</th>
                            <th scope="col">Validade</th>
                            <th scope="col">Ação</th>
                        </tr>
                        </thead>
                        <tbody class="list bg-white">
                        @foreach ($contas as $conta)
                            <tr>
                                <td class="white-text-normal">
                                    <h5>
                                        <b>{{ get_dados_usuario($conta['user_id'])->name }}</b> #{{ $conta['user_id'] }}
                                        <br>
                                    </h5>
                                </td>
                                <td>
                                    @foreach ($conta['contas'] as $info)
                                        <span class="mb-2 d-block">
                                            <b>{{ $info['nickname'] }}</b>
                                            [#{{ $info['seller_id'] }}]
                                            </span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($conta['contas'] as $created_at)
                                        <span class="mb-2 d-block">
                                        {{ $created_at['created_at'] }}
                                        </span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($conta['contas'] as $created_at)
                                        <span class="mb-2 d-block">
                                        {{ $created_at['updated_at'] }} |
                                        <span class="@if($created_at['dias']<1) text-danger @endif">{{ $created_at['dias'] }} dias</span>
                                        </span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($conta['contas'] as $item)
                                        <span class="mb-2 d-block">
                                        <form method="POST"
                                              action="{{ route('admins.integracoes.clientes.mercadolivre.update', $item['id']) }}"
                                              class="form-inline d-inline"> @csrf @method('PUT')
                                            <input type="hidden" name="seller_id" value="{{ $item['seller_id'] }}">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fas fa-recycle"></i>
                                            </button>
                                        </form>
                                        <form method="POST"
                                              action="{{ route('admins.integracoes.clientes.mercadolivre.destroy', $item['id']) }}"
                                              class="form-inline d-inline"> @csrf @method('DELETE')
                                            <input type="hidden" name="user_id" value="{{ $conta['user_id'] }}">
                                            <input type="hidden" name="nome"
                                                   value="{{ $info['nickname'] }} #{{ $info['seller_id'] }}">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        </span>
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
