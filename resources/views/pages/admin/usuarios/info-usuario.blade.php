@extends('layouts.admin', ['title' => 'Cadastro de Clientes', 'menu_suspenso' => 'usuarios'])

@section('content')
    <div class="header bg-principal bg-height-top"></div>

    <!-- Page content -->
    <div class="container-fluid mt--9">
        <div class="row">
            <div class="col">
                <div class="card mb-4">
                    <!-- Card header -->
                    <div class="card-header border">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">Informações do Cliente</h3>
                            <div class="d-flex">
                                <span class="px-2">Status</span>
                                <label class="custom-toggle">
                                    <input type="checkbox" @if ($usuario->status) checked @endif>
                                    <span class="custom-toggle-slider rounded-circle"></span>
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="container-fluid my-3">
                        <h5>Informações Pessoais</h5>
                        <div class="table-responsive card mb-4">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th scope="row" class="col-3">
                                        <span>Nome:</span>
                                    </th>
                                    <td>
                                        {{ $usuario->nome }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span>E-mail:</span>
                                    </th>
                                    <td>
                                        {{ $usuario->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span>Celular:</span>
                                    </th>
                                    <td>
                                        @if (isset($dados['celular'])) {{ $dados['celular'] }} @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span>CPF:</span>
                                    </th>
                                    <td>
                                        @if (isset($dados['cpf'])) {{ $dados['cpf'] }} @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span>Endereço:</span>
                                    </th>
                                    <td>
                                        @if (isset($dados['endereco'])) {{ $dados['endereco'] }} @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Informacoes Comerciais -->
                        <h5>Informações Comerciais</h5>
                        <div class="table-responsive card mb-4">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th scope="row" class="col-3">
                                        <span>CNPJ:</span>
                                    </th>
                                    <td>
                                        @if (isset($dados['cnpj'])) {{ $dados['cnpj'] }} @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span>Nome Fantasia:</span>
                                    </th>
                                    <td>
                                        @if (isset($dados['nome_fantasia'])) {{ $dados['nome_fantasia'] }} @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span>Razão Social:</span>
                                    </th>
                                    <td>
                                        @if (isset($dados['razao_social'])) {{ $dados['razao_social'] }} @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span>Representatante Comercial:</span>
                                    </th>
                                    <td>
                                        @if (isset($dados['nome_comercial'])) {{ $dados['nome_comercial'] }} @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span>Email Comercial:</span>
                                    </th>
                                    <td>
                                        @if (isset($dados['email_comercial'])) {{ $dados['email_comercial'] }} @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span>Perfil:</span>
                                    </th>
                                    <td>
                                        @if (isset($dados['perfil'])) {{ $dados['perfil'] }} @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <h5>Anotações</h5>
                        <div class="table-responsive card mb-4">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th scope="row" class="col-3">
                                        <span>Perfil:</span>
                                    </th>
                                    <td>
                                        @if (isset($dados['perfil'])) {{ $dados['perfil'] }} @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <span>Cadastrado Dia:</span>
                                    </th>
                                    <td>
                                        @if (isset($usuario->created_at)) {{ date('d/m/Y H:i:s', strtotime($usuario->created_at) )  }} @endif
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">Redefinir Senha</h3>
                        </div>
                    </div>
                    <div class="container-fluid my-3">
                        <div class="table-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
    </div>
@endsection




