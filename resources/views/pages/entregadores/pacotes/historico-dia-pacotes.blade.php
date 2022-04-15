<x-layout menu="historico" submenu="historico-pacotes">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-2">Histórico de Pacotes</h4>
                        {{ date('d/m/Y', strtotime($dia)) }}
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm"
                           href="{{ route('entregadores.pacotes.historico') }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">

                <ul class="list-group list-group-flush">
                    @foreach ($pacotes as $pacote)
                        @include('layouts.componentes.list-pacotes', ['link' => 'entregadores.pacote.show'])
                    @endforeach

                    @if ($pacotes->isEmpty())
                        <div class="col-auto text-center p-3">
                            <small>Não há histórico de pacotes.</small>
                        </div>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</x-layout>
