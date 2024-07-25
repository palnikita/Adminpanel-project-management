<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'assign_to',
        'email',
        'phone',
        'project',
        'subject',
        'priority',
        'attachment',
        'message',
        'status'
    ];


    public function feedback()
{
    return $this->hasMany(Feedback::class);
}

}
