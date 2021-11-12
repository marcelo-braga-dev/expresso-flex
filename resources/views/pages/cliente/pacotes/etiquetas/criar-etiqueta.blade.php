@extends('layouts.admin', ['title' => 'Etiquetas'])

@section('content')

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-1">Criar Etiqueta</h4>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('layouts.componentes.alerts')

                <form method="post" action="{{ route('cliente.etiqueta.criar-etiqueta') }}" autocomplete="off">
                    @csrf
                    @method('put')

                    <!-- Endereco -->
                    <h5>Pontos de Coleta</h5>
                    <div class="form-row">
                        <div class="col-lg-6">
                            <label class="form-control-label @if (empty($pontosColeta))text-danger @endif" for="loja">Local de Coleta do
                                Pacote</label>
                            <select class="form-control @if (empty($pontosColeta))border-danger @endif" name="loja" required>
                                @foreach ($pontosColeta as $pontos)
                                    <option class="form-control" value="{{ $pontos['id'] }}">
                                        {{ $pontos['nome'] }}
                                    </option>
                                @endforeach
                            </select>
                            @if (empty($pontosColeta))
                                <small class="text-danger">Por favor, cadastre um ponto de coleta.</small>
                                <a class="btn btn-primary btn-sm text-white m-2"
                                    href="{{ route('cliente.coleta.pontos-de-coleta') }}">
                                    Cadastrar Ponto de Coleta
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Destinatario -->
                    <hr>
                    <h5>Informações do Destinatário</h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="nome">Nome do Destinatario</label>
                                <input type="text" name="nome" id="nome" class="form-control form-control-alternative"
                                    required autofocus>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="cpf">CPF</label>
                                <input type="text" name="cpf" id="cpf" class="form-control form-control-alternative"
                                    required autofocus>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="celular">Telefone</label>
                                <input type="text" name="celular" id="celular" class="form-control form-control-alternative"
                                    required autofocus>
                            </div>
                        </div>
                    </div>

                    <!-- Endereco -->
                    <hr>
                    <h5>Endereço de Entrega</h5>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="cep">Cep</label>
                                <input type="text" name="endereco[cep]" id="cep"
                                    class="form-control cep form-control-alternative input" minlength="9" required
                                    autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="form-group">
                                <label class="form-control-label" for="rua">Rua/Avenida</label>
                                <input type="text" name="endereco[rua]" id="rua"
                                    class="form-control form-control-alternative input" required autofocus>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="numero">Número</label>
                                <input type="text" name="endereco[numero]" id="numero"
                                    class="form-control form-control-alternative input" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="complemento">Complemento</label>
                                <input type="text" name="endereco[complemento]" id="complemento"
                                    class="form-control form-control-alternative input" autofocus>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="bairro">Bairro</label>
                                <input type="text" name="endereco[bairro]" id="bairro"
                                    class="form-control form-control-alternative input" required autofocus>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="cidade">Cidade</label>
                                <input type="text" name="endereco[cidade]" id="cidade"
                                    class="form-control form-control-alternative input" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mb-3">
                        <div class="col-6">
                            <div class="text-center">
                                <input type="hidden" name="id_entregador" value="{{ id_usuario_atual() }}">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')

    <script src="/assets/js/components/busca-cep.js"></script>
@endsection
