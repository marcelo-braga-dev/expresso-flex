<x-layout menu="etiquetas" submenu="gerar">

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 mb-4">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-1">Gerar Etiqueta</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('clientes.etiquetas.expressoflex.store') }}"
                      autocomplete="off"> @csrf
                <!-- Endereco -->
                    <h5>Pontos de Coleta</h5>
                    <div class="form-row">
                        <div class="col-lg-6">
                            <label class="form-control-label" for="loja">
                                Local de Coleta do Pacote
                            </label>
                            <select class="form-control" name="loja" required>
                                @foreach ($lojas as $pontos)
                                    <option class="form-control" value="{{ $pontos['id'] }}">
                                        {{ $pontos['nome'] }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($lojas->isEmpty())
                                <small class="text-danger">Por favor, cadastre um ponto de coleta.</small>
                                <a class="btn btn-primary btn-sm text-white m-2"
                                   href="{{ route('clientes.lojas.create') }}">
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
                            <x-inputs.input label="Nome do Destinatario" type="text" name="nome" id="nome" required
                                            autofocus></x-inputs.input>
                        </div>
                        <div class="col-lg-3">
                            <x-inputs.input label="CPF" type="text" name="cpf"></x-inputs.input>
                        </div>
                        <div class="col-lg-3">
                            <x-inputs.input label="Telefone" type="text" name="celular"></x-inputs.input>
                        </div>
                    </div>

                    <!-- Endereco -->
                    <hr>
                    <h5>Endereço de Entrega</h5>
                    <div class="row">
                        <div class="col-lg-3">
                            <x-inputs.input label="Cep" type="text" name="endereco[cep]" id="cep"
                                            required></x-inputs.input>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9">
                            <x-inputs.input label="Rua/Avenida" type="text" name="endereco[rua]"
                                            id="rua" required></x-inputs.input>
                        </div>
                        <div class="col-lg-3">
                            <x-inputs.input label="Número" type="text" name="endereco[numero]"
                                            required></x-inputs.input>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <x-inputs.input label="Complemento" type="text"
                                            name="endereco[complemento]"></x-inputs.input>
                        </div>
                        <div class="col-lg-4">
                            <x-inputs.input label="Bairro" type="text" name="endereco[bairro]"
                                            id="bairro" required></x-inputs.input>
                        </div>
                        <div class="col-lg-3">
                            <x-inputs.input label="Cidade" type="text" name="endereco[cidade]"
                                            id="cidade" required></x-inputs.input>
                        </div>
                        <div class="col-lg-3">
                            <x-inputs.input label="Estado" type="text" name="endereco[estado]"
                                            id="estado" required></x-inputs.input>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-auto mx-auto">
                            <button type="submit" class="btn btn-primary">Criar Etiqueta</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('js')
        <script src="{{ asset('assets') }}/js/components/busca-cep.js"></script>
    @endpush
</x-layout>
