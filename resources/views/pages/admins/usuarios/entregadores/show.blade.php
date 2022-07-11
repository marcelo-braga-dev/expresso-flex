<x-layout menu="usuarios" submenu="usuarios-entregadores">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card shadow mb-4">
            <div class="card-header border">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Informações do Entregador</h3>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ route('admins.usuarios.entregadores.index') }}">
                            Voltar
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body p-1">
                @if (!empty($token))
                    <div class="card card-body bg-white mb-3">
                        <div class="row">
                            <div class="col-12">
                                <h5>Link para entregador cadastrar a sua senha:</h5>
                                <span>{{ route('mail.usuario.retorno.novo-senha', [$usuario->email, $token]) }}</span>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card card-body bg-white mb-3">
                    <h5>Informações Pessoais</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Nome: {{ $usuario->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <p>E-mail: {{ $usuario->email }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p>CPF: @if (isset($dados['cpf'])) {{ $dados['cpf'] }} @endif</p>
                        </div>
                        <div class="col-md-4">
                            <p>CNPJ: {{ $dados['cnpj'] ?? '' }}</p>
                        </div>
                        <div class="col-md-4">
                            <p>Telefone: @if (isset($dados['celular'])) {{ $dados['celular'] }} @endif</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Endereço: @if (isset($dados['endereco'])) {{ $dados['endereco'] }} @endif</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            @if (!empty($dados['img_cnh']))
                            <small><b>CNH</b></small>
                                <img class="img-thumbnail d-block"
                                     src="{{ asset('storage/' . $dados['img_cnh'] ?? '') }}">
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if (!empty($dados['img_documento_veiculo']))
                                <small><b>Documento do Veículo</b></small>
                                <img class="img-thumbnail d-block"
                                     src="{{ asset('storage/' . $dados['img_documento_veiculo'] ?? '') }}">
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <a class="btn-link text-sm" href="{{ route('admins.usuarios.entregadores.edit', $usuario->id) }}">
                                Editar Informações do Entregador
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
