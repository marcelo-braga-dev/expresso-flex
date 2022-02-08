<x-layout>
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-1">Importar Pacotes para Entrega do Mercado Livre</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col">
                        <p>Importe suas vendas realizadas no Mercado Livre automaticamento por meio do arquivo Excel.
                            <a href="/">Veja como.</a>
                        </p>
                    </div>
                </div>
                <div class="d-none d-md-block">
                    <form method="post" action="{{ route('clientes.importacoes.mercadolivre.store') }}"
                          enctype="multipart/form-data"> @csrf
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label>Arquivo de Importação</label>
                                <input type="file" name="arquivo" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label>Ponto de Coleta</label>
                                <select class="form-control" name="loja" required>
                                    <option value=""></option>
                                    @foreach($lojas as $loja)
                                        <option value="{{ $loja->id }}">{{ $loja->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Importar Pacotes</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row mb-4 d-md-none">
                    <div class="alert alert-info">Não é possível realizar a importação do arquivo pelo aplicativo.
                        Acesse pelo navegador do computador.</div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-layout>
