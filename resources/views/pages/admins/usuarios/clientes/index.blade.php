<x-layout menu="usuarios" submenu="usuarios-clientes">
    <div class="header bg-principal bg-height-top"></div>
    <div class="container-fluid mt--9">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-bottom">
                        <div class="row justify-content-between align-items-center px-3">
                            <div>
                                <h3 class="mb-0">Clientes Cadastrados</h3>
                                <a class="btn btn-primary" href="{{ route('admins.usuarios.clientes.create') }}">
                                    Cadastrar Cliente
                                </a>
                            </div>
                            <div>
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
                    <div class="table-responsive pb-5">
                        <table class="table align-items-center table-flush">
                            <tbody class="list">
                            @foreach ($clientes as $usuario)
                                <tr>
                                    <td>
                                        <span class="text-gray-dark">
                                        <b>{{ $usuario->name }}</b><br>
                                        Id: #{{ $usuario->id }} <br>
                                        Email: {{ $usuario->email }}<br>
                                        </span>
                                        @if (!empty($novaConta[$usuario->email]))
                                            <a href="{{ route('admins.usuarios.clientes.show', $usuario->id) }}">
                                                O usuário ainda não ativou sua conta.
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="text-gray-dark"
                                           href="{{ route('admins.fretes.clientes.edit', $usuario->id) }}">
                                            <b>Preços dos Fretes</b><br>
                                            São Paulo: @if (!empty($fretes[$usuario->id]['sao_paulo']))
                                                R$ {{ $fretes[$usuario->id]['sao_paulo'] }}@else <span
                                                    class="text-danger">Não Inserido</span>@endif
                                            <br>
                                            Grande SP: @if (!empty($fretes[$usuario->id]['grande_sao_paulo']))
                                                R$ {{ $fretes[$usuario->id]['grande_sao_paulo'] }}@else <span
                                                    class="text-danger">Não Inserido</span>@endif
                                        </a>
                                    </td>
                                    <td>
                                        <b>Status</b><br>
                                        <label class="custom-toggle">
                                            <input type="checkbox" class="status-usuario" value="{{ $usuario->id }}"
                                                   @if ($usuario->status) checked @endif>
                                            <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                                  data-label-on="Yes"></span>
                                        </label>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn border btn-sm btn-icon-only text-dark" href="#" role="button"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item"
                                                   href="{{ route('admins.usuarios.clientes.edit', $usuario->id) }}">
                                                    Editar Cliente
                                                </a>
                                                <a class="dropdown-item"
                                                   href="{{ route('admins.fretes.clientes.edit', $usuario->id) }}">
                                                    Editar Preço Frete
                                                </a>
                                                <a class="dropdown-item"
                                                   href="{{ route('admins.usuarios.clientes.show', $usuario->id) }}">
                                                    Detalhes
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.admin.usuarios.partials.modalAlteraStatus')

</x-layout>
