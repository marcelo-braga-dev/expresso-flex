@extends('layouts.admin', ['title' => 'Todos Contas Mercado Livre'])

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
                                <h3 class="mb-0">Contas Sincronizadas</h3>
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

                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort">CLiente</th>
                                <th scope="col" class="sort">ID da Contas</th>
                                <th scope="col" class="sort">Data da Sincronia</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody class="list">

                            @foreach($contas as $conta)
                            <tr>
                                <th scope="row">
                                    <span>{{ get_dados_usuario($conta['user_id'])->nome }}</span> 
                                    <small class="d-block">ID: #{{ $conta['user_id'] }}</small>
                                </th>
                                <td>
                                    @foreach ($conta['seller_id'] as $seller_id)
                                    #{{ $seller_id }}<br>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($conta['created_at'] as $created_at)
                                    {{ date('d/m/y', strtotime($created_at)) }}<br>
                                    @endforeach
                                </td>
                                <td class="text-right">
                                    
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Card footer -->
                    {{-- <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fas fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div> --}}
                </div>
            </div>
        </div>
    @include('layouts.footers.auth')
    </div>
@endsection

