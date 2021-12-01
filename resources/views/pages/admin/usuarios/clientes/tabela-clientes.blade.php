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
                                <h3 class="mb-0">Clientes Cadastrados</h3>
                                <a class="btn btn-primary" href="{{ route('admin.usuarios.clientes.new') }}">
                                    Cadastrar Cliente
                                </a>
                            </div>
                            <div>
                                <small>Link para cadastro de clientes</small>
                                <span class="text-sm d-block">{{ route('cliente.criar-conta') }}</span>
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
                                    <th scope="col" class="sort" data-sort="name">ID</th>
                                    <th scope="col" class="sort" data-sort="budget">Nome</th>
                                    <th scope="col" class="sort" data-sort="status">Status</th>
                                    <th scope="col" class="sort" data-sort="completion">E-mail</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($clientes as $usuario)
                                    <tr>
                                        <th scope="row">
                                            {{ $usuario->id }}
                                        </th>
                                        <td class="budget">
                                            {{ $usuario->nome }}
                                        </td>
                                        <td>
                                            <label class="custom-toggle">
                                                <input type="checkbox" class="status-usuario" value="{{ $usuario->id }}"
                                                    @if ($usuario->status) checked @endif>
                                                <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                                    data-label-on="Yes"></span>
                                            </label>
                                        </td>
                                        <td>
                                            {{ $usuario->email }}
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn border btn-sm btn-icon-only text-dark" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.usuarios.clientes.edit', ['id' => "$usuario->id"]) }}">
                                                        Editar
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.usuarios.clientes.info-clientes', ['id' => "$usuario->id"]) }}">
                                                        Detalhes
                                                    </a>
                                                </div>
                                            </div>
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
    
    @include('pages.admin.usuarios.partials.modalAlteraStatus')
    

@endsection
