<x-layout menu="usuarios" submenu="usuarios-conferentes">

    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card">
            <div class="card-header border-0">
                <div class="row justify-content-between align-items-center px-3">
                    <div>
                        <h3 class="mb-0">Conferente Cadastrados</h3>
                        <a class="btn btn-primary mb-2 mb-md-0" href="{{ route('admins.usuarios.conferentes.create') }}">
                            Cadastrar Conferente
                        </a>
                    </div>
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

            <!-- Light table -->
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="budget">Nome</th>
                        <th scope="col" class="sort" data-sort="status">Status</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @foreach ($conferentes as $usuario)
                        <tr>
                            <td class="budget">
                                <b>{{ $usuario->name }}</b><br>
                                Id: #{{ $usuario->id }}<br>
                                Email: {{ $usuario->email }}<br>
                                @if (!empty($novaConta[$usuario->email]))
                                    <a
                                        href="{{ route('admin.usuarios.clientes.show', $usuario->id) }}">
                                        <small>
                                            O usuário ainda não ativou a conta.
                                        </small>
                                    </a>
                                @endif
                            </td>
                            <td>
                                <label class="custom-toggle">
                                    <input type="checkbox" class="status-usuario" value="{{ $usuario->id }}"
                                           @if ($usuario->status) checked @endif>
                                    <span class="custom-toggle-slider rounded-circle" data-label-off="Não"
                                          data-label-on="Sim"></span>
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
                                           href="{{ route('admins.usuarios.conferentes.edit', $usuario->id) }}">
                                            Editar
                                        </a>
                                        <a class="dropdown-item"
                                           href="{{ route('admins.usuarios.senha.edit', $usuario->id) }}">
                                            Alterar Senha
                                        </a>
{{--                                        <a class="dropdown-item"--}}
{{--                                           href="{{ route('admins.usuarios.conferentes.show', $usuario->id) }}">--}}
{{--                                            Detalhes--}}
{{--                                        </a>--}}
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
    @include('pages.admins.usuarios.partials.modalAlteraStatus')
</x-layout>
