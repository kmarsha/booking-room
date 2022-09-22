<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    use HasFactory;

    protected $table = 'room_bookings';

    protected $fillable = [
        'room_id', 'user_id', 'booking_id', 'date', 'start', 'end',
    ];
    
    protected $dates = ['date', 'start', 'end'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function bookingList()
    {
        return $this->belongsTo(BookingList::class, 'booking_id', 'id');
    }
}
