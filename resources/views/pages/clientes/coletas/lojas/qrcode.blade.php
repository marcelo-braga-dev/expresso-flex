<x-layout>
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card mb-4">

            <div class="card-header border">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Seu QrCode de Identificação</h3>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-qrcode"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body text-center">
                @if (empty($qrCode))
                    <div class="row">
                        <div class="col-12 mb-2">
                            <p>
                                É necessário ter um ponto de coleta ativo para emitir o QrCode de identificação.
                            </p>
                            <a class="btn btn-primary" href="{{ route('clientes.lojas.create') }}">
                                Cadastrar Ponto de Coleta
                            </a>
                        </div>
                    </div>
                @else
                    <div id="qrcode">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <span>
                                    Use o QrCode abaixo para facilitar a identificação do seu Ponto de Coleta de
                                    Pacotes.
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2">
                                <form id="form-lojas">
                                    @foreach ($lojas as $loja)
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="id_loja-{{ $loja->id }}" name="id_loja"
                                                   class="custom-control-input radio-lojas" value="{{ $loja->id }}"
                                                   @if ($loja->id == $loja_sel) checked @endif>
                                            <label class="custom-control-label" for="id_loja-{{ $loja->id }}">
                                                {{ $loja->nome }}
                                            </label>
                                        </div>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                        <div class="row justify-content-center mb-2">
                            <div class="col-auto">
                                <img class="d-block" src="{{ $qrCode }}">
                            </div>
                        </div>
                    </div>

                    <a class="btn btn-primary mb-2" download="Qr_Code.jpg" href="{{ $qrCode }}">Baixar QrCode</a>
                    <a class="d-block small" print="Qr_Code.jpg" href="{{ $qrCode }}" onClick="printDiv()">
                        Imprimir o QrCode
                    </a>
                @endif
            </div>
        </div>
    </div>
    <script>
        function printDiv() {
            var divToPrint = document.getElementById('qrcode');
            newWin = window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }

        $(function () {
            $('.radio-lojas').change(function () {
                document.getElementById('form-lojas').submit();
            });
        });
    </script>
</x-layout>
