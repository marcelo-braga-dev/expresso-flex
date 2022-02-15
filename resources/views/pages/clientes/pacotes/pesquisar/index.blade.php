<x-layout menu="pacotes" submenu="pesquisar">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Pesquisar Pacotes</h4>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 mb-5">
                        <div class="card mb-3 p-4 pb-1">
                            <form action="{{ route('clientes.pacotes.pesquisar.show') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-control-label" for="input-name">
                                            Insira o Códido de Rastreio do Pacote
                                        </label>
                                    </div>

                                    <div class="col-md-8 mb-3">
                                        <div class="form-group m-0">
                                            <input type="text" name="id"
                                                   class="form-control form-control-alternative" value="{{ old('id') }}"
                                                   placeholder="EF0000SP" required autofocus>
                                        </div>
                                    </div>
                                    <div class="col-md-3 align-self-end text-right mb-3">
                                        <button type="submit" class="btn btn-primary">Pesquisar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </div>


    </div>
</x-layout>
