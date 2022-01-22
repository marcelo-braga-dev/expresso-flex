<x-layout>
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card shadow mb-4">
            <div class="card-header border">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Informações do Usuário</h3>
                </div>
            </div>
            <div class="card-body p-1">
                @if (!empty($hash->token))
                    <div class="card card-body bg-white mb-3">
                        <div class="row">
                            <div class="col-12">
                                <h5>Link para cadastrar a senha do primeiro acesso:</h5>
                                <span>{{ route('mail.usuario.retorno.novo-senha', [$usuario->email, $hash->token]) }}</span>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card card-body bg-white mb-3">
                    <h5>Informações Pessoais</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Nome: {{ $usuario->nome }}</p>
                        </div>
                        <div class="col-md-6">
                            <p>E-mail: {{ $usuario->email }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>CPF: @if (isset($dados['cpf'])) {{ $dados['cpf'] }} @endif</p>
                        </div>
                        <div class="col-md-6">
                            <p>Telefone: @if (isset($dados['celular'])) {{ $dados['celular'] }} @endif</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Endereço: @if (isset($dados['endereco'])) {{ $dados['endereco'] }} @endif</p>
                        </div>
                    </div>
                </div>

                <div class="card card-body bg-white mb-3">
                    <h5>Informações Comerciais</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Nome
                                Fantasia: @if (isset($dados['nome_fantasia'])) {{ $dados['nome_fantasia'] }} @endif</p>
                        </div>
                        <div class="col-md-6">
                            <p>CNPJ: @if (isset($dados['cnpj'])) {{ $dados['cnpj'] }} @endif</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Razão Social: @if (isset($dados['razao_social'])) {{ $dados['razao_social'] }} @endif</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Rep.
                                Comercial: @if (isset($dados['nome_comercial'])) {{ $dados['nome_comercial'] }} @endif</p>
                        </div>
                        <div class="col-md-6">
                            <p>Email
                                Comercial: @if (isset($dados['email_comercial'])) {{ $dados['email_comercial'] }} @endif</p>
                        </div>
                    </div>
                </div>

                <div class="card card-body bg-white mb-3">
                    <h5>Outros</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Perfil: @if (isset($dados['perfil'])) {{ $dados['perfil'] }} @endif</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Data do
                                Cadastro: @if (isset($usuario->created_at)) {{ date('d/m/Y H:i:s', strtotime($usuario->created_at)) }} @endif</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layout>
