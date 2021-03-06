<x-layout menu="coletas" submenu="coletas-configs">

    <div class="header bg-principal bg-height-top"></div>
    <!-- Page content -->
    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="row">
            <div class="col">
                <div class="card">

                    <div class="card-header border-0">
                        <h3 class="mb-0">Principais configurções</h3>
                    </div>

                    <div class="card-body">
                        @include('layouts.componentes.alerts')
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    Horário limite para realizar chamados de coleta:
                                </div>
                                <div>
                                    <form class="form-inline" method="POST"
                                          action="{{ route('admins.coletas.config.update') }}">
                                        @csrf @method('put')
                                        <input type="time" name="horario_limite_coleta" class="form-control"
                                               value="{{ $data['horario_limite'] }}" required>
                                        <button class="btn btn-success ml-2">Salvar</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layout>
