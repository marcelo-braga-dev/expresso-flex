<style>
    .text-padrao {
        font-size: 10px;
    }
</style>

@foreach($paginas as $coluna)
    <table style="width: 100%">
        <tr>
            @foreach($coluna as $item)
                <td style="width: 33.333%; padding: 1px 5px;">
                    <table style="border: 1px solid #bebebe;  padding-bottom: 35px">
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets') }}/img/brand/logo-x256.png" width="80px"
                                                 alt="Expresso Flex">
                                        </td>
                                        <td class="text-padrao" style="padding-left:5px">
                                            <small><b>Remetente:</b></small><br>
                                            <span>{{ $loja[$item]->nome }}</span><br>
                                            <span>Tel.: {{ $loja[$item]->telefone }}</span><br>
                                            <span>Endereço: {{ $loja[$item]->endereco }}</span>
                                        </td>
                                    </tr>
                                </table>
                                <hr>
                                {{-- Qrcode--}}
                                <table style="width: 100%">
                                    <tr>
                                        <td class="text-padrao" style="text-align: center">
                                            <img src="{{ $qrCode[$item] }}" width="180px"
                                                 alt="Qrcode com falha"/><br>
                                            <span><b>Código de Rastreio:</b> {{ $rastreio[$item] }}</span>
                                        </td>
                                    </tr>
                                </table>
                                <hr>
                                <table style="width: 100%">
                                    <tr>
                                        <td class="text-padrao" style="padding: 0 10px">
                                            <div class="text-padrao">
                                                <span style="padding-left: 20px"><b>Destinatário:</b> {{ $destinatario[$item]->nome }}</span><br>
                                                <span><b>Telefone:</b> {{ $destinatario[$item]->telefone }} </span>
                                                <br><br>
                                                <span><b>Endereço:</b> {{ $destinatario[$item]->endereco }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <hr>
                                <table style="width: 100%">
                                    <tr>
                                        <td class="text-padrao" style="padding: 0 10px">
                                            <div class="text-padrao">
                                                <small>Quem Recebeu?</small><br>
                                                <span>Nome:</span><br>
                                                <span>Documento:</span><br><br>
                                                <span>Assinatura: _______________________________</span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            @endforeach
            @for($i=count($coluna); $i<3; $i++)
                <td style="width: 33.333%; padding: 0 10px;"></td>
            @endfor
        </tr>
    </table>
@endforeach
