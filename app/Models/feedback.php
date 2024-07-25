<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{



    protected $table = 'feedbacks'; // Specify the correct table name

    protected $fillable = ['ticket_id', 'feedback'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
    use HasFactory;
}
