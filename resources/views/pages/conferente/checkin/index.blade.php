<x-layout menu="checkin" submenu="checkin-pacotes">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col mb-2">
                        <h5 class="card-title text-uppercase text-muted mb-0">
                            Check-in de Pacotes
                        </h5>
                        <h4 class="card-title text-uppercase mb-0">
                            Clique no ícone da câmera para abrir o scanner.
                        </h4>
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
                    @foreach ($pacotes as $pacote)
                        @include('layouts.componentes.list-pacotes',
                        ['link' => 'conferentes.pacote.show', 'simples' => true, 'data' => true])
                    @endforeach

                    @if ($pacotes->isEmpty())
                        <div class="col-auto text-center p-3">
                            <small>Não há registro de pacotes na base.</small>
                        </div>
                    @endif
                    <div class="row justify-content-center">
                        <div class="col-auto py-2">
                            {{ $pacotes }}
                        </div>
                    </div>
                </ul>
            </div>
        </div>

        <x-elements.camera-botao-flutuante
            operacao="{{ route('conferentes.qrcode.checkin-pacote', ['user_id' => id_usuario_atual()]) }}"
            retorno="{{ url()->current() }}"></x-elements.camera-botao-flutuante>

    </div>
</x-layout>
