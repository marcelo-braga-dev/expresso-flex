<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaValues extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ['meta_key', 'value', 'meta_id'];


    public function value($key)
    {
        $meta = $this->newQuery()
            ->where('meta_key', '=', $key)
            ->first('value');

        return $meta->value ?? '';
    }

    public function updateValue(string $key, string $value)
    {
        $this->newQuery()
            ->where('meta_key', '=', $key)
            ->update(['value' => $value]);
    }



    public function meta()
    {
        return $this->belongsTo(Meta::class);
    }

    public function get_meta_values(string $key)
    {
        $resposta = $this::where('meta_key', '=', $key)->get('value')->toArray();

        return $resposta;
    }

    public function set_meta_value(string $key, string $value)
    {
        $this::where('meta_key', '=', $key)
            ->update(['value' => $value]);
    }
}
