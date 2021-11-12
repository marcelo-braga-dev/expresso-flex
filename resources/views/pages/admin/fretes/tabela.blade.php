@extends('layouts.admin', ['title' => 'Todos Clientes'])

@section('content')

    <div class="header bg-principal bg-height-top"></div>

    <!-- Page content -->
    <div class="container-fluid mt--9">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <div class="row justify-content-between align-items-center px-3">
                            <div>
                                @if ($tipo == 'cliente')
                                    <h3 class="mb-0">Valores dos Fretes dos Cliente</h3>
                                @endif
                                @if ($tipo == 'entregador')
                                    <h3 class="mb-0">Valores das Comissões dos Entregadores</h3>
                                @endif
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

                    @include('layouts.componentes.alerts')

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush text-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort text-left">CLiente</th>
                                        <th scope="col" class="sort">São Paulo</th>
                                        <th scope="col" class="sort">Grande São Paulo</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="list bg-white">
                                    @foreach ($usuarios as $cliente)
                                        <tr>
                                            <th scope="row" class="sort text-left">
                                                <span>{{ get_dados_usuario($cliente['user_id'])->nome }}</span>
                                                <small class="d-block">ID: #{{ $cliente['user_id'] }}</small>
                                            </th>
                                            <td class="">
                                                @if (empty($cliente['sao_paulo'])) <?php $cliente['sao_paulo'] = 0; ?> @endif
                                                R$ {{ number_format($cliente['sao_paulo'], 2, ',', '.') }}
                                            </td>
                                            <td>
                                                @if (empty($cliente['grande_sao_paulo'])) <?php $cliente['grande_sao_paulo'] = 0; ?> @endif
                                                R$ {{ number_format($cliente['grande_sao_paulo'], 2, ',', '.') }}
                                            </td>
                                            <td class="text-right">
                                                <a class="btn btn-link p-0 btn-sm"
                                                    href="{{ route('admin.fretes.atualiza-preco-clientes', ['id' => $cliente['user_id']]) }}">
                                                    Editar
                                                </a>
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
        @include('layouts.footers.auth')
    </div>
@endsection
