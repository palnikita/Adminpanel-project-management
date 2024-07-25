<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'phone', 'gender', 'job_title', 'role' , 'salary', 'salterm', 'email', 'password'
    ];

    protected $hidden = [
        'password',
    ];
}
