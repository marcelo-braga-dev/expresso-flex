<x-layout menu="pacotes" submenu="pacotes-clientes">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">{{ get_nome_usuario($id) }}</h4>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach ($datas as $data)
                        <li class="list-group-item align-items-center row-clickable px-4">
                            <p class="mb-0">
                                <i class="fas fa-calendar-alt mr-2 text-primary"></i>
                                <b>{{ $data['dia'] }}/{{ $data['mes'] }}/{{ $data['ano'] }}</b>
                                <span class="ml-4 d-block">
                                    <a class="btn btn-link p-0 btn-sm"
                                       href="{{ route('admins.pacotes.historico.clientes.pacotes',
                                            ['id' => $id, 'dia'=> $data['dia'], 'mes' => $data['mes'], 'ano' => $data['ano']]) }}">
                                        Ver pacotes
                                    </a>
                                </span>
                            </p>
                        </li>
                    @endforeach

                    @if (empty($datas))
                        <div class="col-auto text-center p-3">
                            <small>Não há histórico de pacotes.</small>
                        </div>
                    @endif
                </ul>
            </div>
        </div>


    </div>
</x-layout>
