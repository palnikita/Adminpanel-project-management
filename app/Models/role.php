<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    protected $fillable = [
        'rolename',
        'view_leads',
        'add_leads',
        'delete_leads',
        'edit_leads',
        'view_team',
        'add_team',
        'delete_team',
        'edit_team',
        'view_roles',
        'edit_roles',
        'delete_roles',
        'add_roles',
        'view_task',
        'add_task',
        'delete_task',
        'edit_task',
    ];

    // Default attribute values
    protected $attributes = [
        'view_leads' => 1,
        'add_leads' => 1,
        'delete_leads' => 1,
        'edit_leads' => 1,
        'view_team' => 1,
        'add_team' => 1,
        'delete_team' => 1,
        'edit_team' => 1,
        'view_roles' => 1,
        'edit_roles' => 1,
        'delete_roles' => 1,
        'add_roles' => 1,
        'view_task' => 1,
        'add_task' => 1,
        'delete_task' => 1,
        'edit_task' => 1,
    ];
}
