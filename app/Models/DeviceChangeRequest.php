<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceChangeRequest extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id', 'full_name', 'username', 'password'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
