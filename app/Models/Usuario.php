<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model implements Authenticatable
{
    use HasFactory;

    protected $hidden = ['password'];

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return Auth::user()->remember_token;
    }

    public function setRememberToken(string $value)
    {
        return Auth::user()->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
    public $timestamps = false;
}
