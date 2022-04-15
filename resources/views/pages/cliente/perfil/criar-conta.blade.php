<x-layout class="bg-secundario">

    @if (empty($errors->first('sucesso')))

        <div class="container pb-5 pt-6">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-header bg-transparent text-center pb-2">
                            <div class="row mb-4 justify-content-center">
                                <div class="col-6 col-md-4">
                                    <img src="/assets/img/brand/logo-x256.png" style="width: 100%">
                                </div>
                            </div>
                            <p>
                                Use o formulário abaixo para criar sua conta em nossa plataforma.
                            </p>
                        </div>
                        <div class="card-body px-lg-5 py-4">
                            <form method="post" action="{{ route('cliente.new') }}" autocomplete="off">
                                @csrf
                                @method('put')

                                @include('layouts.componentes.alerts')

                                <div class="px-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="nome">Nome</label>
                                        <input type="text" name="nome" id="nome"
                                               class="form-control form-control-alternative"
                                               value="@if (isset($usuario->nome)){{ $usuario->nome }}@endif"
                                               required autofocus>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-control-label" for="email">E-mail</label>
                                                <input type="email" name="email" id="email"
                                                       class="form-control form-control-alternative"
                                                       value="@if (isset($usuario->email)){{ $usuario->email }}@endif"
                                                       required autofocus>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-control-label" for="celular">Celular</label>
                                                <input type="text" name="celular" id="celular"
                                                       class="form-control form-control-alternative"
                                                       value="@if (isset($dados['celular'])){{ $dados['celular'] }}@endif"
                                                       required autofocus>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h6 class="heading-small text-muted mb-4">
                                        Informações Empresariais (Opcionais)
                                    </h6>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="cnpj">CNPJ</label>
                                                <input type="text" name="cnpj" id="cnpj"
                                                       class="form-control form-control-alternative"
                                                       value="@if (isset($dados['cnpj'])){{ $dados['cnpj'] }}@endif"
                                                       autofocus>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="razao_social">Razão
                                                    Social</label>
                                                <input type="text" name="razao_social" id="razao_social"
                                                       class="form-control form-control-alternative"
                                                       value="@if (isset($dados['razao_social'])){{ $dados['razao_social'] }}@endif"
                                                       autofocus>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label" for="nome_fantasia">Nome Fantasia</label>
                                        <input type="text" name="nome_fantasia" id="nome_fantasia"
                                               class="form-control form-control-alternative"
                                               value="@if (isset($dados['nome_fantasia'])){{ $dados['nome_fantasia'] }}@endif"
                                               autofocus>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="nome_comercial">Nome do
                                                    Representante
                                                    Comercial</label>
                                                <input type="text" name="nome_comercial" id="nome_comercial"
                                                       class="form-control form-control-alternative"
                                                       value="@if (isset($dados['nome_comercial'])){{ $dados['nome_comercial'] }}@endif"
                                                       autofocus>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <label class="form-control-label" for="email_comercial">
                                                    E-mail do Representante Comercial
                                                </label>
                                                <input type="email" name="email_comercial" id="email_comercial"
                                                       class="form-control form-control-alternative"
                                                       value="@if (isset($dados['email_comercial'])){{ $dados['email_comercial'] }}@endif"
                                                       autofocus>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <input type="hidden" name="tipo" value="cliente">
                                        <button type="submit" class="btn btn-success mt-4">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @else

        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8">
                    <div class="card bg-secondary shadow border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="row mx-auto mb-3">
                                <h4>Conta criada com sucesso!</h4>
                            </div>
                            <div class="row mx-auto">
                                <p>Enviamos um email para você criar a sua senha para acessar nossa plataforma.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</x-layout>
