<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *///'password' => Hash::make($data['password']),

    protected $fillable = [
        'tipo',
        'nome',
        'email',
        'password',
        'status',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function meta()
    {
        return $this->hasMany(UserMeta::class);
    }

    public function entregador()
    {
        return $this->hasMany(RegioesEntregadores::class);
    }

    public function lojas()
    {
        return $this->hasMany(LojasClientes::class);
    }
}
