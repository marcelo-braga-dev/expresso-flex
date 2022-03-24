<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordNew extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'token'
    ];

    public function getToken($email)
    {
        $token = $this->newQuery()
            ->where('email', '=', $email)
            ->first('token');

        return $token->token ?? '';
    }
}
