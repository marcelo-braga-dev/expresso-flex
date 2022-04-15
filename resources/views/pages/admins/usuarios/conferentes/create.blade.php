<x-layout menu="usuarios" submenu="usuarios-conferentes">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Cadastro de Conferente</h4>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (!empty($mensagem))
                    <div class="alert alert-success">
                        {{ $mensagem }}
                    </div>
                @endif
                <form method="post" action="{{ route('admins.usuarios.conferentes.store') }}" autocomplete="off">
                    @csrf
                    <div class="px-lg-4">
                        <h6 class="heading-small text-muted mb-4">Informações do Cliente</h6>
                    </div>

                    <div class="px-lg-4">
                        <div class="form-group">
                            <label class="form-control-label" for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control form-control-alternative"
                                   required autofocus>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">E-mail</label>
                                    <input type="email" name="email" id="email"
                                           class="form-control form-control-alternative"
                                           required autofocus>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-control-label" for="celular">Celular</label>
                                    <input type="text" name="celular" id="celular"
                                           class="form-control form-control-alternative"
                                           required autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="perfil">Perfil</label>
                                    <textarea type="text" name="perfil" id="perfil" rows="5"
                                              class="form-control form-control-alternative" required
                                              autofocus></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="hidden" name="tipo" value="cliente">
                            <input type="hidden" name="editar"
                                   value="@if (isset($usuario->id)){{ $usuario->id }}@endif">
                            <input type="hidden" name="id" value="@if (isset($usuario->id)){{ $usuario->id }}@endif">
                            <button type="submit" class="btn btn-success mt-4">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</x-layout>
