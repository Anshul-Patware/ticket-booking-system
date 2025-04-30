<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'event_id', 'booking_time'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
