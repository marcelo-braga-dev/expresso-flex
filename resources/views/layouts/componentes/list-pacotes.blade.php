<li class="list-group-item row-clickable">
    <div class="row d-flex justify-content-between align-items-center">
        <div class="col-12 col-md-10">
            @if (!empty($pacote->updated_at))
                <small>
                    {{ date('d/m/Y', strtotime($pacote->updated_at)) }}
                    @if (date('d/m/Y', strtotime($pacote->updated_at)) == date('d/m/Y'))
                        - Hoje
                    @endif
                </small>
            @endif

            <p class="mb-0">
                <i class="fas fa-user mr-2 text-primary"></i>
                <b>{{ get_destinatario_pacote($pacote->destinatario)->nome }}</b>
            </p>
            @empty($simples)
                <p class="mb-0">
                    <i class="fas fa-map-marker-alt mr-2 text-danger"></i>
                    {{ get_endereco($pacote->endereco) }}
                </p>
            @endempty
            <p class="text-sm mb-0">
                <i class="fas fa-qrcode mr-2"></i>
                {{ get_origem_pacote($pacote->origem) }}
                @if (!empty($pacote->codigo))
                    - <b>#{{ $pacote->codigo }}</b>
                @else
                    - <b>{{ $pacote->rastreio }}</b>
                @endif
            </p>
            <p class="text-sm mb-0">
                <i class="fas fa-calendar-alt mr-2"></i>
                {{ date('d/m/y H:i', strtotime($pacote->created_at)) }}
            </p>
            @empty($simples)
                <small class="d-block text-success mt-2">
                    <i class="fas fa-box mr-2"></i>
                    {{ get_status_pacote($pacote->status) }}
                </small>
            @endempty
        </div>
        <div class="col-12 col-md-2 text-right">
            <a class="small pl-5" href="{{ route($link, $pacote->id) }}">
                Detalhes
            </a>
        </div>
    </div>
</li>
