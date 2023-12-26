<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Login extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    protected $table = 'users';
    protected $fillable = [
        'email',
        'password',
        'ten',
        'diachi',
        'sdt',
        'imgpro',
    ];
    protected $keyType = 'string';
    public function getKeyName()
    {
        return 'email';
    }

}
