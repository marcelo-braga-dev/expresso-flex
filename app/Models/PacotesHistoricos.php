<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacotesHistoricos extends Model
{
    use HasFactory;

    public $fillable = ['user_id', 'pacotes_id', 'status', 'value'];
}
