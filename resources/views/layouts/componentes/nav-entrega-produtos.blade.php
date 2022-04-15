<div class="header bg-principal bg-height-top p-4">
    <div class="row justify-content-center">
        <div class="col-md-4 text-center mb-2">
            <a type="button" class="btn btn-lg btn-block
                @if ($nav == 'cadastrar') btn-primary text-white @else btn-secondary @endif"
                href="{{ route('entregadores.entrega.entrega-iniciadas') }}">
                <i class="fas fa-box"></i>
                Entregas para Realizar
            </a>
        </div>
        <div class="col-md-4 text-center mb-2">
            <a type="button" class="btn btn-lg btn-block
            @if ($nav == 'andamento') btn-primary text-white @else btn-secondary @endif"
                href="{{ route('entregadores.entrega.em-andamento') }}">
                <i class="fas fa-angle-double-right"></i>
                Em Andamento
            </a>
        </div>
        <div class="col-md-4 text-center mb-2">
            <a type="button" class="btn btn-lg btn-block
            @if ($nav == 'finalizado') btn-primary text-white @else btn-secondary @endif"
                href="{{ route('entregadores.entrega.entregas-finalizadas') }}">
                <i class="fas fa-check"></i>
                Finalizados
            </a>
        </div>
    </div>
</div>
