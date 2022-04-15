<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ['title', 'id'];

    public function values()
    {
        return $this->hasMany(MetaValues::class);
    }

    public function findMetaValue(string $key, $meta)
    {
        $value = $meta->values()
            ->where('meta_key', '=', $key)
            ->first('value');

        return $value->value;
    }
}
