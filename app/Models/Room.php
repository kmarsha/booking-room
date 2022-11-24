<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = [
        'name', 'description', 'capacity', 'photo', 'status',
    ];

    public function bookList()
    {
        return $this->hasMany(BookingList::class);
    }

    public function roomBook()
    {
        return $this->hasMany(RoomBooking::class);
    }

    public function rescheduled()
    {
        return $this->hasMany(Reschedule::class);
    }
}
