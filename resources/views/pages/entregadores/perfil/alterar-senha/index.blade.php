<x-layout menu="perfil" submenu="alterar-senha">
    <div class="header bg-principal bg-height-top"></div>
    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-bottom">
                        <div class="row justify-content-between align-items-center px-3">
                            <div>
                                <h3 class="mb-0">Alterar senha</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <p>Alterar sua senha:</p>
                            </div>
                        </div>
                        <form method="POST"
                              action="{{ route('entregadores.perfil.alterar-senha.update', $user->id) }}"> @csrf @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <x-inputs.input label="Nova senha" name="nova_senha"
                                                    type="password" minlength="6" required></x-inputs.input>
                                </div>
                                <div class="col-md-6">
                                    <x-inputs.input label="Repetir nova senha" name="repetir_senha"
                                                    type="password" minlength="6" required></x-inputs.input>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-auto mx-auto">
                                    <button type="submit" class="btn btn-primary">Alterar senha</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
