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
        'name',
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

    public function metaValue($id, $key)
    {
        $meta = UserMeta::query()
            ->where([
                ['user_id', '=', $id],
                ['meta_key', '=', $key]])
            ->first();

        return $meta->value ?? '';
    }

    public function metaValues($id): array
    {
        $dados = [];

        $userMeta = new UserMeta();
        $metas = $userMeta->newQuery()
            ->where('user_id', '=', $id)
            ->get();

        foreach ($metas as $meta) {
            $dados[$meta->meta_key] = $meta->value ?? '';
        }

        return $dados;
    }

    public function usuarios($tipo)
    {
        return $this->newQuery()
            ->where('tipo', '=', $tipo)
            ->orderBy('id', 'desc')->get();
    }

    public function dados($id)
    {
        return $this->newQuery()
            ->find($id);
    }

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
