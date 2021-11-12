@extends('layouts.admin', ['title' => 'Check-in de Pacotes'])

@section('content')
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
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
            <div class="card-body p-0"><?php $data = ''; ?>

                <ul class="list-group list-group-flush">
                    @foreach ($pacotes as $pacote)

                        @include('layouts.componentes.list-pacotes',
                        ['link' => 'conferente.pacotes.info', 'simples' => true, 'data' => true])

                    @endforeach
                </ul>
            </div>
        </div>

        @include('layouts.footers.auth')
        <a href="{{ route('conferente.pacotes.qrcode.checkin.start') }}" class="btn-flutuante btn-danger btn-camera"
            target="_blank" style="display: none">
            <i style="margin-top:12px" class="fas fa-camera"></i>
        </a>
        <script>
            if (Android.isAndroid()) {
                $('.btn-camera').show();
            }
        </script>
    </div>
@endsection
