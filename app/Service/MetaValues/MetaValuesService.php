<?php

namespace App\Service\MetaValues;

use App\Models\Meta;
use App\Models\MetaValues;

class MetaValuesService
{
    public function getKeysMercadoPago()
    {
        $metaValues = MetaValues::where('meta_id', '=', '8')->get();

        foreach ($metaValues as $values) {
            $dados[$values->meta_key] = $values->value;
        }

        return $dados;
    }

    public function setKeysMercadoPago($request)
    {
        $meta = Meta::find(8);

        $meta->values()
            ->where('meta_key', '=', 'private_key')
            ->update(['value' => $request->private_key]);

        $meta->values()
            ->where('meta_key', '=', 'public_key')
            ->update(['value' => $request->public_key]);

        session()->flash('sucesso', 'Dados atualizado com sucesso.');
    }
}
