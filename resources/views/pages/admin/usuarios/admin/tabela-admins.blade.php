@extends('layouts.admin', ['title' => 'Todos Administradores'])

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
                                <h3 class="mb-0">Administradores Cadastrados</h3>
                                <a class="btn btn-primary" href="{{ route('admin.usuarios.admin.new') }}">
                                    Cadastrar Administrador
                                </a>
                            </div>

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

                                @foreach ($admins as $admin)
                                    <tr>
                                        <th>
                                            #{{ $admin->id }}
                                        </th>
                                        <td>
                                            {{ $admin->nome }}
                                        </td>
                                        <td>
                                            @if ($admin->status)
                                                <i class="fas fa-check text-success"></i>
                                            @else
                                                <i class="fas fa-times text-danger"></i>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $admin->email }}
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn border btn-sm btn-icon-only text-dark" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.usuarios.admin.edit', ['id' => "$admin->id"]) }}">
                                                        Editar
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.usuarios.admin.info', ['id' => "$admin->id"]) }}">
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
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection