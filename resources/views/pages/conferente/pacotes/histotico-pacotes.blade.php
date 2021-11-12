{{-- @extends('layouts.admin', ['title' => 'Histórico de Pacotes'])

@section('content')
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Histórico de Pacotes</h4>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="table-responsive bg-white">
                            <table class="white-text-normal table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Código de<br> Rastreio</th>
                                        <th scope="col">Origem</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Destinatário</th>
                                        <th scope="col">Endereço de Entrega</th>
                                        <th>Data</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pacotes as $pacote)
                                        <tr>
                                            <td>
                                                {{ $pacote->rastreio }}
                                            </td>
                                            <td class="white-text-normal">
                                                {{ get_origem_pacote($pacote->origem) }}
                                                @if (!empty($pacote->codigo))
                                                    <br><small>#{{ $pacote->codigo }}</small>
                                                @endif
                                            </td>
                                            <td class="white-text-normal">
                                                {{ get_status_pacote($pacote->status) }}
                                            </td>
                                            <td class="white-text-normal">
                                                {{ get_destinatario_pacote($pacote->destinatario)->nome }}
                                            </td>
                                            <td class="white-text-normal">
                                                {{ get_endereco_destinatario($pacote->destinatario) }}
                                            </td>
                                            <td>
                                                {{ date('d/m/y', strtotime($pacote->updated_at)) }}<br>
                                                {{ date('H:i', strtotime($pacote->updated_at)) }}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn border btn-sm btn-icon-only text-dark" href="#"
                                                        role="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <a class="dropdown-item"
                                                            href="{{ route('conferente.pacotes.info', ['id' => $pacote->id]) }}">
                                                            Ver Detalhes
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if (!count($pacotes))
                            <div class="row">
                                <div class="col-auto mx-auto text-muted pt-4">
                                    Não há histórico de coletas.
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <script>
            $(function() {
                $('.btn-cancelar').click(function() {
                    console.log('x');
                    $(this).parent().parent().find('textarea').removeClass('d-none');
                });
            });
        </script>

        @include('layouts.footers.auth')
    </div>
@endsection --}}
