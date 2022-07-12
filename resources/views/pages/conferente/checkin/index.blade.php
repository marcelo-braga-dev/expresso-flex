<meta http-equiv="refresh" content="3">
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
                            Realizar checkin de Pacotes
                        </h4>
                    </div>

                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>
                </div>
                <div class="row pt-3 justify-content-end btn-camera" style="display: none">
                    <div class="col-6 text-warning">
                        <button class="btn btn-warning btn-sm link-btn-flutuante-1">
                            <i class="fas fa-camera"></i>
                            Abrir Camera
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                @foreach ($entregadores as $index => $entregador)
                    <div class="row row-clickable bg-white m-1 mb-2 p-3">
                        <div class="col-12">
                            <div class="row">
                                <p class="mb-0">
                                    <i class="fas fa-motorcycle mr-2 text-black"></i>
                                    <b>{{ get_nome_usuario($index) }}</b>
                                </p>
                            </div>
                            <div class="row justify-content-between align-items-center">
                                <p class="d-block mb-0">
                                    <i class="fas fa-box text-warning mr-2"></i>
                                    Faltam <span class="text-lg"><b>{{ count($entregador) }}</b></span> pacotes.
                                </p>
                                <a class="small pl-5"
                                   href="{{ route('conferentes.checkin.show', $index) }}">
                                    Ver pacotes
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

                @empty($entregadores)
                    <div class="col-auto text-center p-3">
                        <small>Não há histórico de pacotes.</small>
                    </div>
                @endempty
            </div>
        </div>

        <x-elements.camera-botao-flutuante
            operacao="{{ route('conferentes.qrcode.checkin-pacote', ['user_id' => id_usuario_atual()]) }}"
            retorno="{{ url()->current() }}"></x-elements.camera-botao-flutuante>

    </div>
</x-layout>
