<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Device;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable

{
    use HasFactory;

    public function devices()
    {
        return $this->hasMany(Device::class);
    }


    protected $fillable = [
        'name',
        'email',
        'username',
        'user_role',
        'password',
    ];
}