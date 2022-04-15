<div class="header bg-principal bg-height-top p-4">
    <div class="row justify-content-center">
        <div class="col-md-4 text-center mb-2">
            <a type="button" class="btn btn-lg btn-block
                @if ($nav == 'aceitas') btn-primary text-white @else btn-secondary @endif"
                href="{{ route('entregadores.coletas.coletas-disponiveis') }}">
                <i class="fas fa-dolly mr-2"></i>
                Coletas para Aceitar
            </a>
        </div>
        <div class="col-md-4 text-center mb-2">
            <a type="button" class="btn btn-lg btn-block
            @if ($nav == 'pacotes') btn-primary text-white @else btn-secondary @endif"
                href="{{ route('entregadores.coletas.coletas-aceitas') }}">
                <i class="fas fa-box mr-2"></i>
                Cadastrar Pacotes da Coleta
            </a>
        </div>
    </div>
</div>
