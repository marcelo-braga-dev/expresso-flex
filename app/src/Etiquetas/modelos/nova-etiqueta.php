<div style="width: 300px; height:500px; border: 1px solid; padding: 20px; font-family:verdana">
    <div style="display: block; text-align: center">
        <table style="font-size:12px">
            <tr>
                <td>
                    <img src="/assets/img/brand/logo-x256.png" width="100px">
                </td>
                <td style="padding-left:5px">
                    <span style="font-size:12px">
                        <b><?= $remetente ?></b> #<?= $idRemetente ?>
                    </span><br>
                    Tel.: <?= $telRemetente ?><br>
                    End.: <?= $endRemetente ?><br>
                </td>
            </tr>
        </table>
    </div>
    <hr>
    <div style="display: block; text-align: center">
        <img src="<?= $imgQrCode ?>" width="200px" style="display: block-inline;" />
    </div>
    <div style="display: block; text-align: center">
        <span style="display: block-inline;"><b>Código Rastreio:</b> <?= $codRastreio ?></span>
    </div>
    <hr>
    <div style="display: block;">
        <p>
            <b>Destinatário:</b> <?= $destinatario ?>
        </p>
        <p>
            <b>Telefone:</b> <?= $telefoneRemetente ?>
        </p>
        <p>
            <b>Endereço:</b> <?= $enderecoDestinatario ?>
        </p>
        <p>
            <b>Cidade:</b> <?= $cidadeDestinatario ?>
        </p>
        <p>
            <b>Cep:</b> <?= $cep ?>
        </p>
    </div>
</div>

