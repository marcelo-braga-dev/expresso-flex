<x-layout>
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">
                            Solicitar Coleta
                        </h4>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-dolly"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('cliente.coleta.solicitar-coleta.put') }}" autocomplete="off">
                    @csrf
                    @method('put')

                    @include('layouts.componentes.alerts')

                    @if (!count($pontosColeta)) <?php $limite['bloqueio'] = true; ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Você não possui pontos de coletas cadastrados.<br>
                            Cadastre um ponto de coleta dos seus produtos antes de solicitar coletas.<br>
                            <a class="btn btn-white text-principal my-2"
                                href="{{ route('clientes.lojas.create') }}">
                                Cadastrar Ponto de Coleta
                            </a>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="px-lg-4">
                        <div class="form-row">
                            <div class="col-lg-6">
                                <label class="form-control-label" for="loja">Pontos de Coleta</label>
                                <select class="form-control" name="loja" @if ($limite['bloqueio']) disabled @endif required>
                                    @foreach ($pontosColeta as $pontos)
                                        @if ($pontos['status'])
                                            <option class="form-control" value="{{ $pontos['id'] }}">
                                                {{ $pontos['nome'] }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6 align-self-end text-center">
                                @if ($limite['bloqueio'])
                                    <small class="text-danger">
                                        Não é possível solicitar coletas depois das {{ $limite['horario'] }}.
                                    </small>
                                @else
                                    <small>
                                        Solicitações de coletas podem ser realizadas até às
                                        {{ $limite['horario'] }}.
                                    </small>
                                @endif
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-auto col-lg-6">
                                <button type="submit" class="btn btn-success mt-4 btn-block" @if ($limite['bloqueio']) disabled @endif>
                                    Solicitar Coleta
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


        </div>
        </x-layout>
