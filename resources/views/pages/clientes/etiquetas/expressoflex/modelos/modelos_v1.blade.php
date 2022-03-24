<div style="width: 300px; height:500px; border: 1px solid; padding: 20px; font-family:verdana">
    <div style="display: block; text-align: center">
        <table style="font-size:12px">
            <tr>
                <td>
                    <img src="{{ asset('assets') }}/img/brand/logo-x256.png" width="80px" alt="Expresso Flex">
                </td>
                <td style="padding-left:5px">
                    <small><b>Remetente:</b></small><br>
                    <span>
                        {{ $loja->nome }}
                    </span><br>
                    <span>
                        Tel.: {{ $loja->telefone }}
                    </span><br>
                    <span>
                        Endereço: {{ $loja->endereco }}
                    </span>
                </td>
            </tr>
        </table>
    </div>
    <hr>
    <div style="display: block; text-align: center">
        <img src="{{ $qrCode }}" width="150px" style="display: block;"/>
    </div>
    <div style="display: block; text-align: center">
        <small><b>Código Rastreio:</b> {{ $etiqueta->rastreio }}</small>
    </div>
    <hr>
    <div style="display: block;">
        <span>
            <b>Destinatário:</b> {{ $destinatario->nome }}
        </span>
        <br>
        <span>
            <b>Telefone:</b> {{ $destinatario->telefone }}
        </span>
        <br>
        <br>
        <span>
            <b>Endereço:</b> {{ $destinatario->endereco }}
        </span>
    </div>
    <hr>
    <div>
        <small>Quem Recebeu?</small><br>
        <span>Nome:</span><br>
        <span>Documento:</span><br>
        <span>Assinatura: _______________________________</span>
    </div>
</div>
