<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public $fillable = ["number", "type", "status"];
    public function bookings()
    {
        return $this->hasMany(Booking::class, "roomID");
    }
}
