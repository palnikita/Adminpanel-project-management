<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'Leadtype',
        'phone',
        'website',
        'label',
        'Date',
        'Owner',
        'Status',
        'source',
        'Address',
        'Description',
    ];

}
