<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'meta_key',
        'value',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
