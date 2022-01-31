<x-layout>
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 px-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <small class="badge badge-info">Coleta de Pacotes <i class="fas fa-dolly"></i></small>
                        <h4 class="card-title text-uppercase mb-0">
                            Criar Solicitações de Coleta
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">Voltar</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('entregadores.coletas.store') }}"> @csrf
                    <div class="row mb-3">
                        <div class="col-12">
                            <p>
                                Selecione o cliente ou abra a câmera para ler o QrCode de identifição
                                do Ponto de Coleta do cliente.
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
                            <select class="form-control select2" name="id">
                                <option>Selecione o Cliente</option>
                                @foreach ($clientes as $cliente)
                                    @foreach ($cliente['lojas'] as $loja)
                                        <option value="{{ $loja['id'] }}">
                                            {{ get_nome_usuario($cliente['user_id']) . ' [' . $loja['name'] . ']' }}
                                        </option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Botao Flutuante -->
    <a href="{{ route('entregador.qrcode.usuario.cliente.start') }}" class="btn-flutuante btn-danger btn-camera"
       target="_blank" style="display: none">
        <i style="margin-top:12px" class="fas fa-camera"></i>
    </a>
    <script>
        if (Android.isAndroid()) {
            $('.btn-camera').show();
        }
    </script>
</x-layout>
