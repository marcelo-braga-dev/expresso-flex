<x-layout menu="usuarios" submenu="usuarios-entregadores">

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 mb-6">
        <div class="card">
            <div class="card-header border-0 justify-content-between">
                <div class="row justify-content-between align-items-center px-3">
                    <div>
                        <h3>Entregadores Cadastrados</h3>
                        <a class="btn btn-primary mb-2 mb-md-0" href="{{ route('admins.usuarios.entregadores.create') }}">
                            Cadastrar Entregador
                        </a>
                    </div>
                    <div class="text-center">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" id="search" placeholder="Pesquisar...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0 bg-white border-top">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <tbody class="list">
                        @foreach ($entregadores as $usuario)
                            <tr class="borde">
                                <td class="pb-1" style="white-space: normal">
                                    <b>{{ $usuario->name }}</b><br>
                                    Id: #{{ $usuario->id }}<br>
                                    Email: {{ $usuario->email }}<br>
                                    @if (!empty($novaConta[$usuario->email]))
                                        <a
{{--                                            href="{{ route('admin.usuarios.clientes.info-clientes', ['id' => "$usuario->id"]) }}"--}}
                                        >
                                            <small>O usuário ainda não ativou sua conta.</small>
                                        </a>
                                    @endif
                                </td>
                                <td class="pb-1">
                                    <b>Comissões</b><br>
                                    São Paulo: @if (!empty($fretes[$usuario->id]['sao_paulo']))
                                        R$ {{ $fretes[$usuario->id]['sao_paulo'] }}@else <span class="text-danger">Não Informado</span>@endif
                                    <br>
                                    Grande São Paulo: @if (!empty($fretes[$usuario->id]['grande_sao_paulo']))
                                        R$ {{ $fretes[$usuario->id]['grande_sao_paulo'] }}@else <span
                                            class="text-danger">Não Informado</span>@endif
                                </td>
                                <td class="pb-1">
                                    <b>Status:</b><br>
                                    <label class="custom-toggle">
                                        <input type="checkbox" class="status-usuario" value="{{ $usuario->id }}"
                                               @if ($usuario->status) checked @endif>
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                              data-label-on="Yes"></span>
                                    </label>
                                </td>
                                <td class="text-right pb-1">
                                    <div class="dropdown">
                                        <a class="btn border btn-sm btn-icon-only text-dark" href="#" role="button"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item"
                                               href="{{ route('admins.usuarios.entregadores.edit', $usuario->id) }}">
                                                Editar Dados
                                            </a>
                                            <a class="dropdown-item"
                                               href="{{ route('admins.fretes.clientes.edit', $usuario->id) }}">
                                                Editar Comissão
                                            </a>
{{--                                            <a class="dropdown-item"--}}
{{--                                               href="{{ route('admins.usuarios.entregadores.show', $usuario->id) }}">--}}
{{--                                                Detalhes--}}
{{--                                            </a>--}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border-0 p-1 pl-4 text-success" colspan="3" style="white-space: normal">
                                    Áreas de Coletas:<br>
                                    @isset($regioes[$usuario->id]['regiao_coleta'])
                                        @foreach ($regioes[$usuario->id]['regiao_coleta'] as $regiao)
                                            {{ $regiao }},
                                        @endforeach
                                    @endisset
                                </td>
                            </tr>
                            <tr>
                                <td class="border-0 p-1 pl-4 text-warning" colspan="3" style="white-space: normal">
                                    Áreas de Entregas:<br>
                                    @isset($regioes[$usuario->id]['regiao_coleta'])
                                        @foreach ($regioes[$usuario->id]['regiao_coleta'] as $regiao)
                                            {{ $regiao }},
                                        @endforeach
                                    @endisset
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('pages.admin.usuarios.partials.modalAlteraStatus')
</x-layout>
