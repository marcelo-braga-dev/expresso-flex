<x-layout menu="perfil" submenu="minha-conta">
    <div class="header bg-principal bg-height-top"></div>
    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Editar suas informações</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('entregadores.perfil.usuario.update', id_usuario_atual()) }}"
                      autocomplete="off">
                    @csrf @method('put')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label" for="nome">Seu Nome</label>
                                <input type="text" name="nome" id="nome"
                                       class="form-control form-control-alternative"
                                       value="{{ $usuario['name'] ?? '' }}" required
                                       autofocus>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label" for="email">E-mail</label>
                                <input type="email" name="email" id="email"
                                       class="form-control form-control-alternative"
                                       value="{{ $usuario['email'] ?? '' }}"
                                       required autofocus>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-control-label" for="cpf">CPF</label>
                                <input type="text" name="cpf" id="cpf"
                                       class="form-control form-control-alternative"
                                       value="{{ $usuario['cpf'] ?? '' }}"
                                       required autofocus>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-control-label" for="celular">Celular</label>
                                <input type="text" name="celular" id="celular"
                                       class="form-control form-control-alternative"
                                       value="{{ $usuario['celular'] ?? '' }}"
                                       required autofocus>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
