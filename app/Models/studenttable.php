<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studenttable extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_name', 'student_standard','student_seatnumber','student_courses','student_phonenumber'
    ];
    public $timestamps=false;
}
