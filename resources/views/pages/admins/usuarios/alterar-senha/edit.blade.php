<x-layout menu="usuarios">
    <div class="header bg-principal bg-height-top"></div>
    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-bottom">
                        <div class="row justify-content-between align-items-center px-3">
                            <div>
                                <h3 class="mb-0">Alterar senha do usuário</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-auto">
                                <h3>Nome: {{ $user->name }}</h3>
                            </div>
                        </div>
                        <form method="POST"
                              action="{{ route('admins.usuarios.senha.update', $user->id) }}"> @csrf @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <x-inputs.input label="Nova senha" name="nova_senha"
                                                    type="text" minlength="6" required></x-inputs.input>
                                </div>
                                <div class="col-md-6">
                                    <x-inputs.input label="Repetir nova senha" name="repetir_senha"
                                                    type="text" minlength="6" required></x-inputs.input>
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
