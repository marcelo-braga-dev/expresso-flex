<div class="row justify-content-around p-3 py-4">
    <div class="col-6 col-md-4 text-center">
        <a class="btn {{ $btnColetas }} btn-block"
           href="{{ route('entregadores.coletas.index') }}">
            <i class="fas fa-dolly pr-2"></i> Coletas
        </a>
    </div>
    <div class="col-6 col-md-4 text-center">
        <a class="btn {{ $btnEntregas }} btn-block"
           href="{{ route('entregadores.entregas.index') }}">
            <i class="fas fa-shipping-fast pr-2"></i> Entregas
        </a>
    </div>
</div>
