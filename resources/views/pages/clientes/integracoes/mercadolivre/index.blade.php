<x-layout menu="integracoes" submenu="mercado-livre">

    <div class="header bg-principal bg-height-top"></div>

    <!-- Page content -->
    <div class="container-fluid mt--9 mb-6">
        <div class="card bg-secondary">
            <div class="card-header bg-white">
                <h3 class="mb-0 text-principal">
                    Suas Contas Mercado Livre Vinculadas
                </h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <p>A vinculação de conta é necessária para que o Mercado Livre autorize a nossa plataforma
                            a obter as informações de entregas das suas encomendas.</p>
                        <p>
                            Você pode cancelar a autorização de sincronia a qualquer momento, por meio do painel da
                            sua conta no Mercado Livre.
                        </p>
                        <p>
                            Clique no botão abaixo para iniciar o processo de autorização de acesso.
                        </p>
                    </div>
                    <div class="col-12">
                        @foreach($notificacoes as $item)
                        <div class="alert alert-danger d-block">
                            {{ $item->value }}
                            <form method="POST" action="{{ route('clientes.notificacoes.update', $item->id) }}">
                                @csrf @method('PUT')
                                <button type="submit" class="btn btn-link text-white btn-sm pl-0 mt-2">Excluir Mensagem</button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-primary btn-block" href="{{ $urlIntegracao }}">
                            Autorizar Nova Conta
                        </a>
                    </div>
                </div>
                <hr>

                <h3>Suas Contas Vinculadas</h3>
                <div class="row">
                    <div class="col-12">
                        @foreach ($contas as $conta)
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="avatar-group">
                                                <a class="avatar avatar rounded-circle">
                                                    <img src="{{ $conta['thumbnail'] }}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <span class="d-block">
                                                {{ $conta['brand_name'] }}
                                                @if (!empty($conta['nickname'])) ({{ $conta['nickname'] }}) @endif
                                            </span>
                                            <span class="d-block">
                                                <small>ID da Conta: {{ $conta['seller_id'] }}</small>
                                            </span>
                                            <span class="d-block">
                                                <small>
                                                Data da sincronia: {{ date('d/m/y i:s', strtotime($conta['created_at'])) }} |
                                                Válido até {{ date('d/m/y', strtotime($conta->updated_at . " +6 months")) }},
                                                @if (diferencaDias($conta->updated_at) > 1)
                                                        restam {{ diferencaDias($conta->updated_at) }} dias.
                                                    @else <span class="text-danger"> venceu a {{ str_replace('-', '', diferencaDias($conta->updated_at)) }} dias.</span>
                                                    @endif
                                                </small>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach

                        @if (!count($contas))
                            <div class="row">
                                <div class="col-auto mx-auto p-3">
                                    <small class="text-muted">
                                        Não há contas vinculadas.
                                    </small>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layout>
