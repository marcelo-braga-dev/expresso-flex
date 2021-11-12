<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrecosFretes extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'meta_key',
        'title',
        'value'
    ];
}
