<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MetaValues;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function geral(MetaValues $metaValues)
    {
        $data = [];

        $metas = $metaValues->query()->where('meta_id', '=', 7)->get();

        foreach ($metas as $meta) {
            $data[$meta->meta_key] = $meta->value;
        }
        
        return view('pages.admin.config.variaveis', compact('data'));
    }

    public function update(Request $request, MetaValues $metaValues)
    {
        

        return redirect()->back();
    }
}
